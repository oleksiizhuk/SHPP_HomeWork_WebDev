$(document).ready(function () {

	$(".sandwich").click(function() {
		$(".sandwich").toggleClass("change");

		if ($(".show-for-surprize").is(":visible")) {
			$(".show-for-surprize").fadeOut(600);
			$(".sandwich").css("position", "absolute");
		} else {
			$(".show-for-surprize").fadeIn(600);
			$(".sandwich").css("position", "fixed");
		}
	});

	$('.button-go-up').click(function () {
		$('body,html').animate({
			scrollTop: 0,
		}, 800);
		return false;
	});
});
