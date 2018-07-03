$(document).ready(function () {
	const sandwich = $(".sandwich");
	const showForSurpize = $(".show-for-surprize");
	const page = $('body,html');
	sandwich.click(function() {
		sandwich.toggleClass("change");

		if ( showForSurpize.is(":visible")) {
			showForSurpize.fadeOut(600);
			sandwich.css("position", "absolute");
		} else {
			showForSurpize.fadeIn(600);
			sandwich.css("position", "fixed");
		}
	});

	$('.button-go-up').click(function () {
		page.animate({
			scrollTop: 0,
		}, 800);
		return false;
	});
});

function buttonSubmit() {
    document.getElementById("formEnterEmail").submit();
}
