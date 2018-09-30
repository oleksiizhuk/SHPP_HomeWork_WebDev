$(function() {
	getDataDromJson();

	$('#sendMsg').click(function() {
		const message = $('#inputSend').val();
		if (message.length == 0) {
			$('#inputSend').val('пустое сообщение'); // удалить перед сдачей
			return;
		}
		$('#inputSend').val('');
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

	function createMsg(time,user,message) {
		const blockMsg = $(
			`<div class="bubblechat right">
						<p>
							<span>[${time}] ${user}:</span> 
							${message}
						</p>
					</div>`)
		.appendTo(".chatSection__container__chatWindow");
	}

	function unloadMsgtest(objMsg) {
		for (let value in objMsg) {
				const div = $(
					`<div class="bubblechat left">
						<p>
							<span>${objMsg[value].time} : ${objMsg[value].user} </span> 
							${objMsg[value].message}
						</p>
					</div>`)
				.appendTo(".chatSection__container__chatWindow");
		}
	}

	function getDataDromJson() {
		$.ajax({
			type : "POST",
			url : "handler.php",
			data : "getMsg",
			success: function(ressponce) {
				if(!ressponce) {
					console.log("сообщений за последний час не было")
					return;
				}
				console.log(ressponce);
				const objMsg = $.parseJSON(ressponce);
				console.log(objMsg);
				unloadMsgtest(objMsg);
			}
		});
	}

});