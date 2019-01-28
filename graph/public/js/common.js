$(function () {

    const timeout = 60000;
    const $currencyTable = $("#currencyTable");
    const $getContentForGraphics = $('#getContentForGraphics');
    let loadData;
    parseByApi();
    loadTable();

    $(document).on('input', '.inputRange', function () {
        $('.rangeVal').html($(this).val());
    });

    function parseByApi() {
        $.ajax({
            type: 'GET',
            url: '../parseFile/parse.php',
        }).always(function () {
            setTimeout(parseByApi, timeout);
        });
    }

    function loadTable() {
        $.ajax({
            type: 'GET',
            url: '../core/handler.php',
            dataType: 'json',
            data: {
                function: 'loadData'
            }
        }).done(function (res) {
            fillTable(res);
            loadData = setTimeout(loadTable, timeout);
        }).fail(function (res) {
            console.log("F getLastContent - " + res);
            clearTimeout(loadData);
        });
    }

    function fillTable(res) {
        $.each(res, function (key, value) {
            let valueID = $("#" + value.symbol);
            if (valueID.length) {
                updateData(valueID, value);
            } else {
                createDate(value);
            }
        });
    }

    function updateData(valueID, value) {
        $.each(value, function (name, data) {
            if (name === "symbol") {
                return;
            }
            let $thisTD = valueID.find("." + name);
            if (parseFloat($thisTD.text()) === data) {
                $thisTD.text(data).addClass('white');
                return;
            }
            if (parseFloat($thisTD.text()) < data) {
                $thisTD.text(data).addClass('green');
            }
            if (parseFloat($thisTD.text()) > data) {
                $thisTD.text(data).addClass('red');
            }

        });
    }

    function createDate(value) {
        $currencyTable.append(
            $("<tr />").attr("id", value.symbol)
                .append($("<td />").addClass("symbol").text(value.symbol))
                .append($("<td />").addClass("bid").text(value.bid))
                .append($("<td />").addClass("ask").text(value.ask))
                .append($("<td />").addClass("price").text(value.price)));
    }

    $getContentForGraphics.on('submit', function (e) {
        e.preventDefault();
        const data = $(this).serialize();
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '../core/handler.php',
            dataType: 'json',
            data: $(this).serialize() + "&function=createGraph"
        }).done(function (res) {
            if (!res) {
                console.log('Error response is empty');
                return;
            }
            drawGraph(res);

        }).fail(function (res) {
            console.log("fail", res);
        })
    });


    function drawGraph(argument) {

        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let valueGraph = [];
            valueGraph.push(['Time', 'ask', 'bid', 'price']);
            for (let key in argument) {
                valueGraph.push([parseInt(argument[key].date), parseInt(argument[key].ask), parseInt(argument[key].bid), parseInt(argument[key].price)]);
            }
            console.log(valueGraph);

            var data = google.visualization.arrayToDataTable(
                valueGraph
            );

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: {position: 'bottom'}
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    }

});
