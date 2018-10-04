$(function () {
	const main = $('#main');
	const urlPhp = 'php/dataBase.php';
	getInfoAboutDraggableFromJson();

	main.on("dblclick", function(event) {
		$.ajax({
			type : 'POST',
			url : urlPhp,
			data : 'getId=',
			success: function(ressponce) {
				ressponce++;
				const div = $(`
				<div class="draggable" id="${ressponce}">
					<p></p>
					<input type="text" class="dragInput" value="corner">
				</div>`)
				.appendTo("main")
				.css({
					"left": event.pageX + 'px',
					"top": event.pageY + 'px'
				})
				.bind()
				.draggable({
					containment: ".main",
		 			scroll: false
				 });	
				let jsonData = {	
					id: ressponce,
					positionX : event.pageX,
					positionY : event.pageY,
					content : "corner",
					deleted : false
				};
				addNewDraggableToJson(jsonData);
				$("div input:text").first().focus();
			}
		});	
	});

	main.on("dblclick", '.draggable', function(event) {
		$(this).find('input').attr("type", "text").focus().val($(this).text().trim());
		event.stopPropagation();
	});

	$(document).on("blur", "input.dragInput", function(event) {
		const target = $(event.target);
		const value = target.val();
		const id = $(this).parent().attr('id');
		if (value.length == 0) {
			$(`#${id}`).remove();
			deleteElemntWithJson(id)
			return;
		}
		target.attr("type", "hidden");
		target.parent().find('p').text(value);
		saveChangesInBlock(id, value);
	});

	$(document).on("keyup", function(event) {
			const enter = 13;
			const escape = 27;
		if (event.which === enter) {	
			const value = $(event.target).val(); 
			const target = $(event.target);
			if (value.length == 0) {
				console.log('deleted div enter - '+ target.parent().attr('id'));
				const id = target.parent().attr('id');
				$(`#${id}`).remove();
				deleteElemntWithJson(id);
				return;
			}
			$(event.target).val(value);
			$(event.target).attr("type", "hidden");
			$(event.target).parent().find('p').text(value);
			const indexId = $(event.target).index();
			saveChangesInBlock(indexId, value);
			return;
		} 
		if (event.which === escape) {
			const value = $(event.target).val();
			$(event.target).val(value);
			$(event.target).attr("type", "hidden");
		}
	});


	function getInfoAboutDraggableFromJson() {
		$.ajax({
			type : 'POST',
			url : urlPhp,
			data : 'getInfoAboutDraggableFromJson=',
			success: function (ressponce) {
				let obj = $.parseJSON( ressponce );
				for (let value in obj) {
					if( !obj[value].deleted ) { 
						const div  = $(
							`<div class="draggable">
								<p>${obj[value].content}</p>
								<input type="hidden" class="dragInput">
							</div>`)
						.appendTo("main")
						.attr("id", obj[value].id)
						.css({
							left: obj[value]['positionX'] + 'px',
							top: obj[value]['positionY'] + 'px'
						})
						.bind()
						.draggable({
							containment: ".main", 
							scroll: false
						});
					}
				}

				$('.draggable').draggable({
					stop: function(event, ui) {
						const coordinateAndId = `${ui.position.left},${ui.position.top},${event.target.id}`;
						addNewСoordinationToJson(coordinateAndId);
					}
				});	
			}
		});
	};

	function saveChangesInBlock (id, content) {
		let informationOnTheBlock = [];
		informationOnTheBlock[0] = id;
		informationOnTheBlock[1] = content;
		$.ajax({
			type : 'POST',
			url : urlPhp,
			data : 'informationOnTheBlock=' + informationOnTheBlock,
		});
	};
	
	function deleteElemntWithJson(id) {
		$.ajax({
			type : 'POST',
			url : urlPhp,
			data : 'removeElementById=' + id
		});
	};

	function addNewСoordinationToJson(coordination) {
		$.ajax({
			type : 'POST',
			url : urlPhp,
			data : 'addNewСoordinationToJson=' + coordination,
		});
	}

	function addNewDraggableToJson(jsonData) {
		let objData = JSON.stringify(jsonData);
		$.ajax({
			type : 'POST',
			url : urlPhp,
			data : 'objData1=' + objData,
		});
	};

});