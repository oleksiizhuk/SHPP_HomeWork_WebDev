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
	main.on("dblclick", function(ev) {
		drag.createdraggable(event.pageX, event.pageY);
	});

	// show input
	body.on("dblclick", '#draggable', function(event) {
		$(this).children().attr("type", "text").focus();
		const indexInput = $( this ).index();
	});

	// 
	body.on("focusout", '#draggable', function() {
		$(this).find('input').attr("type", "hidden");
		const value = $(this).find('input').val();
		$(this).find('p').text(value);
	});

	$(document).keyup(function(event) {
		if(event.which === 13) {	
			const value = $(':focus').val();
			alert(value);
			$(this).find('p').text(value);
			$(this).find('input').attr("type", "hidden");
		} 
		if(event.which === 27) {
			alert("esc")
			$(this).remove();
			$(this).trigger("enterKey");
			$( elem ).hide();
		}
	});
	main.on("blur",'#draggable' (function(event) {

	});
	
});
const drag ={
	createdraggable: function (evX, evY) {
		const div = $('<div id="draggable" class="draggable ui-widget-content btn btn-primary" data-toggle="modal" data-target="#exampleModal"><p>Drag me</p><input type="hidden" class="dragInput"> </div>')
		.appendTo("body")
		.css({
				"left": evX + 'px',
				"top": evY + 'px'
			})
		.bind()
		.draggable({snap:true, containment: ".main", scroll: false});
	},
}