$(function () {
    setInterval(checkNewMessage, 1000);
    let maxMessageId = 0;

    $('#logout').click(function () {
        $.post("handler.php", {logout: ""});
    });


    $('#sendMsg').click(function (event) {
        event.preventDefault();
        const $inputSend = $('#inputSend');
        const message = $inputSend.val();
        const checkMessage = message.replace(/\s+/g, '');
        if (!checkMessage){
            $inputSend.val('');
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: 'addNewMsg=' + message,
            success: function (){
                $inputSend.val('');
            }
        });
    });


    function checkNewMessage() {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: "checkNewMessage=" + maxMessageId,
            success: function (ressponce) {
                 console.log("ressponce - " + ressponce);
                if (!ressponce) {
                    console.log("не было обновленией");
                    return;
                }
                let obj = $.parseJSON(ressponce);
                console.log(obj);
                createUnloadedMessage(obj);
            }
        });
    }


    function createUnloadedMessage(objMsg) {
        const $chatSection = $('.chatSection__container');
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
            maxMessageId++;
        }
        $chatSection.scrollTop($chatSection.prop("scrollHeight"));
    }


});
