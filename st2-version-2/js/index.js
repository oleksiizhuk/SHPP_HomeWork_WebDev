function sandwich(change) {
    change.classList.toggle("change");

    if ($(".show-for-surprize").is(":visible")) {
    	$(".show-for-surprize").fadeOut(600);
    } else {
    	$(".show-for-surprize").fadeIn(600);
    }
   
}
