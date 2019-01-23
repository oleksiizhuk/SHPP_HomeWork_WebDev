<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<div class="content">
    <button id="createTable">createTable</button>
    <div class="here_table">

    </div>
    <div id="curve_chart" style="width: 550px; height: 300px"></div>
</div>


<form id="getContent">
    <input type="submit">
    <input type="range" min="0" max="60" step="1" name="time">
    <select name="value">
        <option>BTCUSD</option>
        <option>DSHUSD</option>
        <option>LTCUSD</option>
        <option>ETHUSD</option>
        <option>XRPUSD</option>
        <option>BCHUSD</option>
    </select>
</form>

<div class="tocuh" style="width: 30px;height: 30px;background: yellow"></div>

<table id="currencyTable">
    <tr>
        <th>Sumbol</th>
        <th>Bid</th>
        <th>Ask</th>
        <th>Price</th>
    </tr>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--<script src="js/index.js"></script>-->
<script src="js/common.js"></script>
</body>
</html>

<!--<table>
    <tbody>
    <tr class="BTCUSD">
        <td class="symbol">BTCUSD</td>
        <td class="bid">3666.77</td>
        <td class="ask">3666.77</td>
        <td class="price">3666.77</td>
    </tr>
    <tr class="DSHUSD">
        <td class="symbol"></td>
        <td class="bid"></td>
        <td class="ask"></td>
        <td class="price"></td>
    </tr>
    <tr class="LTCUSD">
        <td class="symbol"></td>
        <td class="bid"></td>
        <td class="ask"></td>
        <td class="price"></td>
    </tr>
    <tr class="ETHUSD">
        <td class="symbol"></td>
        <td class="bid"></td>
        <td class="ask"></td>
        <td class="price"></td>
    </tr>
    <tr class="XRPUSD">
        <td class="symbol"></td>
        <td class="bid"></td>
        <td class="ask"></td>
        <td class="price"></td>
    </tr>
    <tr class="BCHUSD">
        <td class="symbol"></td>
        <td class="bid"></td>
        <td class="ask"></td>
        <td class="price"></td>
    </tr>
    </tbody>
</table>-->