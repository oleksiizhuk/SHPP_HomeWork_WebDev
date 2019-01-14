$(function () {
    let lastId = 0;
    checkNewMessage();

    $('#logout').click(function (event) {
        $.post("handler.php", {logout: ""});
        logger.logs(event.which, 'success', 'logout');
    });

    $('#sendMsg').click(function (event) {
        event.preventDefault();
        const $inputSend = $('#inputSend');
        const message = $inputSend.val();
        const checkMessage = message.replace(/\s+/g, '');
        if (!checkMessage) {
            logger.logs(event.which, 'ERROR', 'пустое сообщение');
            $inputSend.val('');
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: 'addNewMsg=' + message
        }).done(function (ressponce) {
            logger.logs('ressponce', 'success', "message: " + message);
            $inputSend.val('');
        }).fail(function (jqXHR) {
            if (jqXHR.status === 400) {
                logger.logs('sendMsg: fail', 'ERROR', "message");
                window.location.href = "index.php";
            }
        });
    });


    function checkNewMessage() {
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            dataType: "json",
            data: "checkNewMessage=" + lastId
        }).done(function (obj) {
            lastId = obj[obj.length - 1].id;
            createUnloadedMessage(obj);
            setTimeout(checkNewMessage, 1000);
        }).fail(function (jqXHR) {
            if (jqXHR.status === 400) {
                logs("AJAX request", "ERROR", "SESSION ERROR/outdated");
                window.location.href = "index.php";
            }
            setTimeout(checkNewMessage, 1000);
        });
    }


    function createUnloadedMessage(objMsg) {
        const $chatSection = $('.chatSection__container');
        for (let value in objMsg) {
            $(`<div class="bubblechat left">
					<p>
						<span class="span__time">[${objMsg[value].date}]</span> 
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


    function logs(event, level, info) {
        if (level === "ERROR") {
            console.error(
                {
                    date: new Date().toLocaleString(),
                    event: event,
                    level: level,
                    info, info
                }
            );
        } else
            console.log(
                {
                    date: new Date().toLocaleString(),
                    event: event,
                    level: level,
                    info, info
                }
            );
    }



});

const logger = {
    current_log: {logs: []},

    logs: function (event, level, info) {
        const log = {
            date: new Date().toLocaleString(),
            event: event,
            level: level,
            info: info
        };
        if (level === "ERROR") {
            console.error(log);
            this.current_log.logs.push(`${log}`);
        } else {
            console.log(log);
            this.current_log.logs.push(`${log}`);
        }
    },

    info: function () {
        this.current_log.logs.forEach(function (elem) {
            console.log(elem);
        });
    }
};