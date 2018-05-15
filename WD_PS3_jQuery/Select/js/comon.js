
$(document).ready(function(){
	const icontop = "&#9207;";
	const iconBotton = "&#9206;";

	let massName = ["Jenny Hess", "Elliot Fu","Stevie Feliciano","Christian","Matt Damon"];

	$(".btn-slide").click(function(){
	  $("#panel").slideToggle("slow");
	  $(this).toggleClass("active");
	});

	$(".ul").on("click", "li", function() { //  заменить ник 
		const name = $(this).text();
		$(this).hide();
		$("#panel").slideToggle("slow");
		$("#selectFreand").text(name);	
		i++;
	});

    $("#buttonAddFreand").click(function() { // добавить  друга
    	const addFriend = $(".addFreand").val();
		if (addFriend === '') {
			alert("You must write something!");
			return;
		}
    	const friend =`<li><img src='image/иконка.png'><span>${addFriend}</span></li>`; 
    	alert(friend);
    	 $("ul").append(friend);

    })
 
});
