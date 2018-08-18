$(function () {
	$('#draggable').draggable();
	const main = $('#main');
	const draggable = $('#draggable');

	main.on('click', function() {

	});

	main.dblclick(function(event) {
		const div = $('<div id="draggable" class="ui-widget-content">Drag me around<input type="text"></div>')
		.appendTo($(this))
		.css({
                "left": event.pageX + 'px',
                "top": event.pageY + 'px'
            })
		.draggable();
	});
	

	$('#main #draggable').dblclick(function(event) {
		alert("x - " + event.pageX);
		alert("y - " + event.pageY);
	});
	const class ={
		
	}

});