function first_task() {
<<<<<<< HEAD
	var firstNumber = document.getElementsByClassName('firstNumber')[0].value + "";
	alert(secondNumber);
		if(firstNumber != number){
			alert ("lol");
			return 0;
		}
	var secondNumber = document.getElementsByClassName('secondNumber')[0].value + "";
	firstNumber = parseInt(firstNumber);
	secondNumber = parseInt(secondNumber);
	//alert (firstNumber);
	//alert(secondNumber);
	//alert (typeof(firstNumber));
	//alert (typeof(secondNumber));
	var result = 0;
	//alert(typeof(result));
	for(var i = firstNumber; i <= secondNumber;i++){
		result = result + i;
		alert(result);
	}
	document.getElementById('result').value = result;
}

function second_task() {
	var firstNumber = document.getElementsByClassName('sec_First_Num')[0].value + "";
	var secondNumber = document.getElementsByClassName('sec_Second_Num')[0].value + "";
	var result = 0;
	firstNumber = parseInt(firstNumber);
	secondNumber = parseInt(secondNumber);

	for(var i = firstNumber; i <= secondNumber; i++){
		var n = i.toString();
		alert(n);
		var t = n.length;
		alert(t);

		if(n[t-1] == "2" || n[t-1] == 3 || n[t-1]==7){
			result = result + i;	
		}
		alert(n[t-1]);
		
	}
	document.getElementById('sec_Id').value = result;


}

function transformation (){

}

function third_task(){
	var elelment = document.getElementsByClassName('third_task')[0];
	elelment.appendChild(document.createElement("ul"));
	var firstNumber = document.getElementsByClassName('third_Num')[0].value + "";
	firstNumber = parseInt(firstNumber);
	var currentUl = elelment.getElementsByTagName('ul');

	var i = 1;
	while(i<=firstNumber){
		for (var j = 0; j < i; j++){
			var list = document.createElement("li").innerHTML = "*";
			currentUl.appendChild(list);
		}
		i++;
	}
}
=======
	var firstNumber;
	var secondNumber;
	alert (firstNumber);
	var result = 0;
	for(var i = firstNumber; firstNumber < secondNumber;i++){
		result = result + firstNumber
	}
	document.getElementById('ceazerRessult').value = result;
}
>>>>>>> 028129396d1e16e91fb53457b8883b4546d82188
