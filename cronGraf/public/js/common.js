$(function () {

    const timeout = 6000;
    const $currencyTable = $("#currencyTable");
    let loadData;

    $(".tocuh").on("click", function () {
        loadTable();
    });

    function createDate(value) {
        $currencyTable.append(
            $("<tr />").attr("id", value.symbol)
                .append($("<td />").addClass("symbol").text(value.symbol))
                .append($("<td />").addClass("bid").text(value.bid))
                .append($("<td />").addClass("ask").text(value.ask))
                .append($("<td />").addClass("price").text(value.price)));
    }

    function updateData(valueID, value) {
        $.each(value, function (name, data) {
            if (name === "symbol"){
                return;
            }
            let $thisTD = valueID.find("." + name);
            if (parseFloat($thisTD.text()) < data) {
                $thisTD.text(data).addClass('green');
            } else {
                $thisTD.text(data).addClass('red');
            }
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

    loadTable();

});