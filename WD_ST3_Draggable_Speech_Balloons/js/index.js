$(function () {
	
	const dragOpts = {
	height: "110px",
    width: "120px"

					};
	$('#draggable').draggable({snap:true, containment: ".main", scroll: false});
	const main = $('#main');
	const draggable = $('.draggable');
	const site = $("html, body");
	const html = $("html");
	const body = $("body");
	main.draggable();

	main.dblclick(function(event) {
		/*const div = $('<div id="draggable" class="ui-widget-content">Drag me around<input type="text"></div>')
		.appendTo($(this))
		.css({
				"left": event.pageX + 'px',
				"top": event.pageY + 'px'
			})
		.draggable();
		console.log(this);*/	
	});

	//  Check resize window
	$(window).resize( function(event) {
		$(".mainResize").text("Width: "+ window.innerWidth + ", height" +window.innerHeight);
	});

	// Create div on the mouse position
	main.on("dblclick", function(event) {
		drag.createdraggable(event.pageX, event.pageY);
	});

	// show input dbclick
	main.on("dblclick", '.draggable', function(event) {
		$(this).children().attr("type", "text").focus().val($(this).text().trim());
		const indexInput = $( this ).index();
		event.stopPropagation();
	});

	// 
	main.on("focusout", '.draggable', function(event) {
		$(this).find('input').attr("type", "hidden");
		const value = $(this).find('input').val();
		$(this).find('p').text(value);
	});

	/*body.on("blur", )*/

	$(document).keyup(function(event) {
		if(event.which === 13) {	
			const value = $(':focus').val();
			alert(value);
			$(this).parent().find('p').text(value);
			//console.log(this);
			$(this).parent().find('input').attr("type", "hidden");
		} 
		if(event.which === 27) {
			alert("esc")
			$(this).remove();
			$(this).trigger("enterKey");
			$( elem ).hide();
		}
	});

	main.on("blur",'#draggable', function(event) {

	});
	
});

	//create new dtaggeble
const drag = {
	createdraggable: function (evX, evY) {
		const div = $('<div class="draggable ui-widget-content btn btn-primary" data-toggle="modal" data-target="#exampleModal"><p>corner</p><input type="hidden" class="dragInput" value=""> </div>')
		.appendTo("main")
		.css({
				"left": evX + 'px',
				"top": evY + 'px'
			})
		.bind()
		.draggable({snap:true, containment: ".main", scroll: false});
	},
};



