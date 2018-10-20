$(function() {
	unloadMessageWithJson();
	setInterval(checkNewMessage, 2000);
	let maxId = 0;

		$('#sendMsg').click(function() {
		const inputSend = $('#inputSend');
		const message = inputSend.val();
		if (!message) {
			inputSend.val('пустое сообщение'); // удалить перед сдачей
			return;
		}
		inputSend.val('');
		$.ajax({
			type : 'POST',
			url : 'handler.php',
			data : 'addNewMsg=' + message,
			success: function (ressponce) { 
				const timeAndDate = ressponce.split(",");
				console.log(ressponce);
				const time = timeAndDate[0];
				const user = timeAndDate[1];
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
				if (ressponce.length == 0) {	
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

	function createMsg(time,user,message) {
		const blockMsg = $(
			`<div class="bubblechat right">
				<p>
					<span class="span__time">[${time}]</span> 
					<span class="span__user">${user}:</span>
					<span class="span__message">${message
												.replace(':)', '<img class="image-smile" src="image/happySmile.png">')
												.replace(':(', '<img class="image-smile" src="image/sad.png">')}</span>				
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

	function unloadMessageWithJson() {
		$.ajax({
			type : "POST",
			url : "handler.php",
			data : "getMsg",
			success: function(ressponce) {
				if (ressponce.length == 0) {
					console.log("за последний час не было сообщений");
					return;
				}
				const objMsg = $.parseJSON(ressponce);
				console.log(objMsg);
				createUnloadedMessage(objMsg);
			}
		});
	}

		
});