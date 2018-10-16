$(function() {
	unloadMessageWithJson();

	let id = setTimeout(function tick() {
		let i = 0;
		i++;
		console.log(i);
		let time = $('.bubblechat:last-child p').children('.span__time').text();
		let ress = time.substring(1, time.length-1);
		let countBubble = $('.bubblechat').length;
		updateMessageW(countBubble);
		id = setTimeout(tick, 5000);
	});

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

	function updateMessageW(time) {
		$.ajax({
			type : 'POST',
			url : 'handler.php',
			data : "updateMessage=" + time,
			success: function (ressponce) {
				let countBubble = $('.bubblechat').length;
				console.log(countBubble + " - bubblechat");
				console.log("ressponce - " + ressponce);

				
				if (ressponce.length == 0) {	
					console.log("не было обновленией");
					return;
				}
				let obj = $.parseJSON(ressponce);
				//console.log(obj.time);
				//console.log(obj[0].time);
					for (let value in obj) {
						const div = $(
							`<div class="bubblechat left">
								<p>
									<span class="span__time">[${obj[value].time}]</span> 
									<span class="span__user">:${obj[value].user}</span>
									<span class="span__message">${obj[value].message}</span>	
								</p>
							</div>`)
						.appendTo(".chatSection__container__chatWindow");
					}
				}
		});
	}

	function createMsg(time,user,message) {
		const blockMsg = $(
			`<div class="bubblechat right">
						<p>
							<span class="span__time">[${time}]</span> 
							<span class="span__user">:${user}</span>
							<span class="span__message">${message}</span>				
						</p>
					</div>`)
		.appendTo(".chatSection__container__chatWindow");
	}

	function createUnloadedMessage(objMsg) {
		for (let value in objMsg) {
				const div = $(
					`<div class="bubblechat left">
						<p>
							<span class="span__time">[${objMsg[value].time}]</span> 
							<span class="span__user">:${objMsg[value].user}</span>
							<span class="span__message">${objMsg[value].message}</span>	
						</p>
					</div>`)
				.appendTo(".chatSection__container__chatWindow");
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