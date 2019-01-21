addContent();

function addContent() {
    $.ajax({
        type: 'POST',
        url: 'handler.php',
        data: "addContent="
    }).done(function (res) {
        console.log("done - " + res);
       // setTimeout(addContent, 600000);
    }).fail(function (res) {
        console.log('fail - ' + res);
        //setTimeout(addContent, 600000);
    })
}