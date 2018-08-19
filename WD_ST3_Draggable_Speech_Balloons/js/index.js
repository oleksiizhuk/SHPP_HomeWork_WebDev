$(function () {
	$('#draggable').draggable({snap:true});
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
		console.log(this);
		console.log(event.pageX);
		console.log(event.pageY);
		console.log(event.type);

	});
	
});
const drag ={
	createdraggable: function (evX, evY) {
		const div = $('<div id="draggable" class="ui-widget-content">Drag me</div>')
		.appendTo("body")
		.css({
                "left": evX + 'px',
                "top": evY + 'px'
            })
		.bind()
		.draggable({snap:true});
	},
}