$(function () {
    unloadMessageWithJson();
    setInterval(checkNewMessage, 1000);
    let maxId = 0;

    $('#exit').click(function (event) {
        $.post("handler.php", {logout: ""});
    });

    $('#sendMsg').click(function (event) {
        event.preventDefault();
        const inputSend = $('#inputSend');
        const message = inputSend.val();
        const checkMessage = message.replace(/ /g, '');
        if (!checkMessage) {
            inputSend.val('');
            return;
        }
        inputSend.val('');
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: 'addNewMsg=' + message
        });
    });

    function checkNewMessage() {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: "checkNewMessage=" + maxId,
            success: function (ressponce) {
                console.log("maxId - " + maxId);
                if (!ressponce.length) {
                    console.log("не было обновленией");
                    return;
                }
                console.log("ressponce - " + ressponce);
                let obj = $.parseJSON(ressponce);
                console.log(obj);
                createUnloadedMessage(obj);
            }
        });
    }

    function unloadMessageWithJson() {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: "getMsg",
            success: function (ressponce) {
                if (!ressponce.length) {
                    return;
                }
                const objMsg = $.parseJSON(ressponce);
                createUnloadedMessage(objMsg);
            }
        });
    }


    function createUnloadedMessage(objMsg) {
        for (let value in objMsg) {
            $(`<div class="bubblechat left">
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
            maxId++;
        }
    }

});
