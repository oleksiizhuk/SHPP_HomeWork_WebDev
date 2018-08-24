$(function () {
	
	const dragOpts = {
	height: "110px",
    width: "120px"

					};
	$('#draggable').draggable({snap:true, dragOpts});
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
	$(window).resize(function(event){
		$(".mainResize").text("Width: "+ window.innerWidth + ", height" +window.innerHeight);
	});

	main.on("dblclick", function(ev) {
		drag.createdraggable(event.pageX, event.pageY);
	});

	body.on("dblclick", '#draggable', function(event) {
		/*console.log(this);
		console.log(event.pageX);
		console.log(event.pageY);
		console.log(event.type);*/

		$(this).children().attr("type", "text").focus();
		const indexInput = $( this ).index();
	});

	body.on("focusout", '#draggable', function() {
		$(this).find('input').attr("type", "hidden");
		const value = $(this).find('input').val();
		$(this).find('p').text(value);
		alert(value);
	});

	$(document).keyup(function(event) {
		if(event.which == 13) {
			alert('You pressed enter!');
		} 
		if(event.which == 27) {
			alert('You pressed Escape');
		}
		
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