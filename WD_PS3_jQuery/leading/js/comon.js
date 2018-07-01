$(document).ready(function () {
	const animationSpeed = 1000;
	const site = $("html, body");
	const goUp = $('#go-up');

	$('.main').on('click', 'a', function (event) { //  по клике на сылку смешаеться
		event.preventDefault();
		const id = $(this).attr('href'),
		top = $(id).offset().top;
		$('body,html').animate({ scrollTop: top }, animationSpeed);

		site.on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function(){ // остановка анимации при клике на страницу
			site.stop();
		});

	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			goUp.fadeIn();
		} else {
			goUp.fadeOut();
		}
	});

		goUp.click(function () {
			$('body,html').animate({
				scrollTop: 0,
			}, animationSpeed);
			return false;
		});

});

