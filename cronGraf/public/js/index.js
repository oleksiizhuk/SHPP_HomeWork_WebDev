$(function () {

    test();

    function test() {
        $.ajax({
            type: 'GET',
            url: 'https://forex.1forge.com/1.0.3/quotes?pairs=BTCUSD,DSHUSD,LTCUSD,ETHUSD,XRPUSD,BCHUSD,ZECUSD&api_key=qh1ztAhaQ6D0fYuyeQy1lVyFqKYYOTXA'
        }).done(function (response) {
            console.log(response);
        }).fail(function () {
            console.log("fail");
        })
    };


    function create() {

    }


});