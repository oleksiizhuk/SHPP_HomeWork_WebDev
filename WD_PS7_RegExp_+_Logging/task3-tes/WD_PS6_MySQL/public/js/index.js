$(function () {
    let lastId = 0;
    checkNewMessage();
    checkErr();

    $('#logout').click(function (event) {
        /* $.post("handler.php", {logout: ""});
         logs(event.which, 'success', 'logout');*/

        $.ajax({
            type: 'POST',
            url: 'handler.php',
            dataType: "json",
            data: 'logout'
        }).always(function (res) {
            console.log(res);
            logs('ressponce', 'success', "message: " + res);
            document.location.href = 'http://hashcode.ru/';
        });
    });

    function checkErr() {
        const errMessage = $('#erBlock').text();
        const ressult = errMessage.replace(/\s+/, '');
        console.log(ressult);
        if (!ressult) {
            return;
        }
        logs('loging', 'ERROR', 'errMessageе :' + ressult);
    }

    $('#sendMsg').click(function (event) {
        event.preventDefault();
        const $inputSend = $('#inputSend');
        const message = $inputSend.val();
        const checkMessage = message.replace(/\s+/g, '');
        if (!checkMessage) {
            logs(event.which, 'ERROR', 'пустое сообщение');
            $inputSend.val('');
            return;
        }
        $.ajax({
            type: 'POST',
            url: 'handler.php',
            data: 'addNewMsg=' + message
        }).done(function (ressponce) {
            logs('ressponce', 'success', "message: " + message);
            $inputSend.val('');
        }).fail(function (jqXHR) {
            if (jqXHR.status === 400) {
                logs('sendMsg: fail', 'ERROR', "message");
                window.location.href = "index.php";
            }
        });
    });

    function checkNewMessage() {
        const user = $('#user_block').text();
        const ressult = user.replace(/\s+/g, '');
        if (!ressult) {
            setTimeout(checkNewMessage, 1000);
            return;
        }
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
/*

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
};*/
