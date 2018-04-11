
$(document).ready(function(){
	let i = 1;
	let icontop = "&#9207;";
	let iconBotton = "&#9206;";

	let massName = ["Jenny Hess", "Elliot Fu","Stevie Feliciano","Christian","Matt Damon"];

	$("#selectFreand").click(function(){ // открыть закрыть список 
		i++;
		if(i % 2 == 0){
			$(".ul").show();
			 $("#iconHouseFirst").hide();
			 $("#iconHouseSecond").show();
		}
		else{
			$(".ul").hide();
			$("#iconHouseFirst").show();
			 $("#iconHouseSecond").hide();
		}
	});

	$(".ul").on("click", "li", function(){ //  заменить ник 
		let name = $(this).text();
		alert(name);
		$(this).hide();
		$(".ul").hide();
		$("#selectFreand").text(name);	
		i++;
	});

    $("#buttonAddFreand").click(function(){ // добавить  друга
    	let addFriend = $(".addFreand").val();
		if (addFriend === '') {
			alert("You must write something!");
			return;
		}
    	let friend =`<li><img src='image/иконка.png'><span>${addFriend}</span></li>`; 
    	alert(friend);
    	 $("ul").append(friend);

    })
 
});
