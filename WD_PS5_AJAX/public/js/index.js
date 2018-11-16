$(function () {
    let lastId = 0;
    checkNewMessage();


    $('#logout').click(function () {
        $.post("handler.php", {logout: ""});
    });


    $('#sendMsg').click(function (event) {
        event.preventDefault();
        const $inputSend = $('#inputSend');
        const message = $inputSend.val();
        const checkMessage = message.replace(/\s+/g, '');
        if (!checkMessage) {
            $inputSend.val('');
            console.log("test - ostanovkas");
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: 'addNewMsg=' + message
        }).done(function (ressponce) {
            console.log(ressponce);
            $inputSend.val('');
        }).fail(function (jqXHR) {
            if (jqXHR.status === 400) {
                window.location.href = "index.php";
            }
        });
    });


    function checkNewMessage() {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            dataType: "JSON",
            data: "checkNewMessage=" + lastId
        }).done(function (obj) {
            lastId = obj[obj.length - 1].id;
            createUnloadedMessage(obj);
            setTimeout(checkNewMessage, 1000);
        }).fail(function (jqXHR) {
            console.log(jqXHR.status);
            if (jqXHR.status === 400) {
                window.location.href = "index.php";
            }
            setTimeout(checkNewMessage, 1000);
        });
    }


    function createUnloadedMessage(objMsg) {
        const $chatSection = $('.chatSection__container');
        for (let value in objMsg) {
            $(`<div class="bubblechat left" id = "2">
					<p>
						<span class="span__time">[${objMsg[value].time}]</span> 
						<span class="span__user">${objMsg[value].user}:</span>
						<span class="span__message">${objMsg[value].message
                .replace(/\:\)/g, '<img class="image-smile" src="image/happySmile.png">')
                .replace(/\:\(/g, '<img class="image-smile" src="image/sad.png">')
                }</span>	
					</p>
				</div>`)
                .appendTo(".chatSection__container__chatWindow");
        }
        $chatSection.scrollTop($chatSection.prop("scrollHeight"));
    }


});
