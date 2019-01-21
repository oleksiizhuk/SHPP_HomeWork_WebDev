$(function () {
    //addContent();
    //getLastContent();
    taskFunc();

    function taskFunc() {
        reloadTable();
        setTimeout(addContent, 600000);
    }

    function reloadTable() {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            dataType: 'json',
            data: {
                getLastContent: 'getLastContent'
            }
        }).done(function (res) {
            console.log("D getLastContent - " + res.length);
            createTable(res);
        }).fail(function (res) {
            console.log("F getLastContent - " + res);
        });
    }

    $('#createTable').on('click', function () {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            dataType: 'json',
            data: {
                getLastContent: 'getLastContent'
            }
        }).done(function (res) {
            console.log("D getLastContent - " + res.length);
            createTable(res);
        }).fail(function (res) {
            console.log("F getLastContent - " + res);
        });
    });

    function addContent() {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: "addContent="
        }).done(function (res) {
            console.log("done - " + res);
            setTimeout(addContent, 600000);
        }).fail(function (res) {
            console.log('fail - ' + res);
            setTimeout(addContent, 600000);
        })
    }

    $('#getContent').on('submit', function (e) {
        e.preventDefault();
        const data = $(this).serialize();
        console.log(data);
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            dataType: 'json',
            data: $(this).serialize() + "&function=getContent"
        }).done(function (res) {
            if (res) {
                console.log(res);
                return;
            }
            console.log("done - " + res[0].symbol);
            info(res);
        }).fail(function (res) {
            console.log('fail - ' + res);
        })
    });

    function createTable(obj) {
        $(".here_table").empty();
        let content = `<table>`;
        $.each(obj, function (numb, item) {
            console.log(item.ask + " " + item.symbol + item.bid + item.price);
            content += '<tr>';
            content += `<td>${item.symbol}</td><td>${item.ask}</td><td>${item.bid}</td><td>${item.price}</td>`;
            content += '</tr>';
        });
        content += `</table>`;
        $('.here_table').append(content);
    }
    let test = 'testtest';

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    var time = "60";
    function drawChart() {
        console.log('test');

        var data = google.visualization.arrayToDataTable([
            ['Time', 'Price', 'bid', 'ask'],
            [``,  1000,      400,  1000],
            [`${time}минут`,  1670,      500,  1900]
        ]);

        var options = {
            title: 'Company Performance',
            curveType: 'function',
            legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }

    /*-----------------------test-----------------------------------------------*/
    /*-----------------------test-----------------------------------------------*/
    /*-----------------------test-----------------------------------------------*/

    $('#a').on('submit', function (e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'test.php',
            data: data
        }).done(function (res) {
            console.log("done - " + res);
        }).fail(function (res) {
            console.log('fail - ' + res);
        })
    });

    function testParse() {
        $.ajax({
            type: 'GET',
            url: 'https://forex.1forge.com/1.0.3/quotes?pairs=BTCUSD,DSHUSD,LTCUSD,ETHUSD,XRPUSD,BCHUSD,ZECUSD&api_key=qh1ztAhaQ6D0fYuyeQy1lVyFqKYYOTXA'
        }).done(function (response) {
            console.log(response);
            setTimeout(test, 10000);
        }).fail(function () {
            console.log("fail");
        });
    }

    /*    const crypt = [
            {symbol: "BTCUSD", bid: 3620.99, ask: 3620.99, price: 3620.99, timestamp: 1547723309},
            {symbol: "BTCUSD", bid: 3620.99, ask: 3620.99, price: 3620.99, timestamp: 1547723309},
            {symbol: "DSHUSD", bid: 70.8753, ask: 71.1859, price: 71.0306, timestamp: 1547723309},
            {symbol: "LTCUSD", bid: 30.93, ask: 30.93, price: 30.93, timestamp: 1547723309},
            {symbol: "ETHUSD", bid: 121.61, ask: 121.61, price: 121.61, timestamp: 1547723309},
            {symbol: "XRPUSD", bid: 0.32599, ask: 0.32599, price: 0.32599, timestamp: 1547723309},
            {symbol: "BCHUSD", bid: 128.158, ask: 128.158, price: 128.158, timestamp: 1547723309}
    ];*/

    function testPereborov(obj) {
        for (let value in obj) {
            console.log(obj[value].ask + " " + obj[value].symbol + obj[value].bid + obj[value].price);
            for (let v in value) {
                console.log(v);
            }
        }
        $.each(obj, function (numb, item) {
            console.log(item.ask + " " + item.symbol + item.bid + item.price);
        });
    }
});