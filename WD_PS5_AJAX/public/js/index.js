$(function() {
	unloadMessageWithJson();
	setInterval(checkNewMessage, 2000);
	let maxId = 0;

    $('#exit').click(function(event){
        $.post("handler.php", {logout: ""});
    });

	$('#sendMsg').click(function(event) {
		event.preventDefault();
		const inputSend = $('#inputSend');
		const message = inputSend.val();
		if (!message) {
			return;
		}
		inputSend.val('');
		$.ajax({
			type : 'POST',
			url : 'handler.php',
			data : 'addNewMsg=' + message,
			success: function (ressponce) { 
				const timeAndUser = ressponce.split(",");
				console.log(ressponce);
				const time = timeAndUser[0];
				const user = timeAndUser[1];
				createMsg(time,user,message);
			}
		});
	});

	function checkNewMessage() {
		$.ajax({
			type : 'POST',
			url : 'handler.php',
			data : "checkNewMessage=" + maxId,
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
			type : "POST",
			url : "handler.php",
			data : "getMsg",
			success: function(ressponce) {
				if (!ressponce.length) {
					return;
				}
				const objMsg = $.parseJSON(ressponce);
				createUnloadedMessage(objMsg);
			}
		});
	}

	function createMsg(time,user,message) {
		const blockMsg = $(
			`<div class="bubblechat right">
				<p>
					<span class="span__time">[${time}]</span> 
					<span class="span__user">${user}:</span>
					<span class="span__message">${message
						.replace(':)', '<img class="image-smile" src="image/happySmile.png">')
						.replace(':(', '<img class="image-smile" src="image/sad.png">')
					}</span>				
				</p>
			</div>`)
		.appendTo(".chatSection__container__chatWindow");
		maxId++;
	}

	function createUnloadedMessage(objMsg) {
		for (let value in objMsg) {
			const div = $(
				`<div class="bubblechat left">
					<p>
						<span class="span__time">[${objMsg[value].time}]</span> 
						<span class="span__user">${objMsg[value].user}:</span>
						<span class="span__message">${objMsg[value].message
							.replace(':)', '<img class="image-smile" src="image/happySmile.png">')
							.replace(':(', '<img class="image-smile" src="image/sad.png">')
						}</span>	
					</p>
				</div>`)
			.appendTo(".chatSection__container__chatWindow");
			maxId++;
		}
	}

});
