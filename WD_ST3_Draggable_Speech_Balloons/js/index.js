$(function () {
	const main = $('#main');
	const enter = 13;
	const escape = 27;
	const urlPhp = 'php/dataBase.php';
	getInfoAboutDraggableFromJson();

	// Create div on the mouse position
	main.on("dblclick", function(event) {
		const div = $(`
			<div class="draggable">
				<p>corner</p>
				<input type="hidden" class="dragInput" value="">
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
		let indexId = div.index(); 
		let jsonData = {	
			id: indexId,
			positionX : event.pageX,
			positionY : event.pageY,
			content : "corner",
			deleted : false
		};
		addNewDraggToJson(jsonData);	
	});

	// show input dbclick
	main.on("dblclick", '.draggable', function(event) {
		$(this).find('input').attr("type", "text").focus().val($(this).text().trim());
		event.stopPropagation();
	});

	$(document).on("blur", "input.dragInput", function(event) {
		const target = $(event.target);
		const value = target.val();
		const id = $(this).parent().attr('id');
		if (value.length == 0) {
			console.log('deleted div - '+ $(this).parent().attr('id'));
			deleteElemntWithJson(id)
			return;
		}
		console.log(event.type)
		target.attr("type", "hidden");
		target.parent().find('p').text(value);
		saveChangesInBlock(id, value);
	});

	$(document).keyup(function(event) {
		if (event.which === enter) {	
			const value = $(event.target).val(); 
			const target = $(event.target);
			if (value.length == 0) {
				console.log('deleted div enter - '+ target.parent().attr('id'));
				const id = target.parent().attr('id');
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
			alert("check esc");
			const value = $(event.target).val();
			$(event.target).val(value);
			$(event.target).attr("type", "hidden");
		}
	});

	function saveChangesInBlock (id, content) {
		let informationOnTheBlock = [];
		informationOnTheBlock[0] = id;
		informationOnTheBlock[1] = content;
		$.ajax({
			type : 'POST',
			url : 'php/dataBase.php',
			data : 'informationOnTheBlock=' + informationOnTheBlock,
			success: function(response) {
				alert (response);
			}
		});
	};
	
	function deleteElemntWithJson(id) {
		$.ajax({
			type : 'POST',
			url : 'php/dataBase.php',
			data : 'removeIdElement=' + id,
			success: function(response) {
				alert(response);
			},
		});
	};

	function getInfoAboutDraggableFromJson() {
		$.ajax({
			type : 'POST',
			url : 'php/dataBase.php',
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

	function addNewСoordinationToJson(coordination) {
		console.log(`addNewСoor -  ${coordination}`);
		$.ajax({
			type : 'POST',
			url : urlPhp,
			data : 'addNewСoordinationToJson=' + coordination,
			success: function(response) {
				console.log(response);
			}
		});
	}

	function addNewDraggToJson (jsonData) {
		console.log(jsonData)
		let objData = JSON.stringify(jsonData);
		$.ajax({
			type : 'POST',
			url : 'php/dataBase.php',
			data : 'objData1=' + objData,
			success: function (ressponce) {
			},
		});
	};

});

