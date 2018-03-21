function first_task() {
	var firstNumber = document.getElementsByClassName('firstNumber')[0].value + "";
		if(firstNumber == null){
			alert ("lol");
			return 0;
		}
	var secondNumber = document.getElementsByClassName('secondNumber')[0].value + "";
	firstNumber = parseInt(firstNumber);
	secondNumber = parseInt(secondNumber);
	var result = 0;
	for(var i = firstNumber; i <= secondNumber;i++){
		result = result + i;
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
		var number = i.toString();
		var lengthNumber = number.length;

		if(number[lengthNumber-1] == "2" || number[lengthNumber-1] == 3 || number[lengthNumber-1]==7){
			result = result + i;	
		}
	}
	document.getElementById('sec_Id').value = result;
}

function third_task(){
	var firstNumber = document.getElementsByClassName('third_Num')[0].value + "";
	firstNumber = parseInt(firstNumber);

	var ul = document.createElement("ul");
	ul.setAttribute('id', 'myUl');
	document.getElementById("list").appendChild(ul);

	for(var i = 1; i <= firstNumber; i++){
		var li = document.createElement("li");
		id  = "myLi" + i;
		li.setAttribute('id', id);

		document.getElementById('myUl').appendChild(li);

		for(var k = 0; k < i; k++){
			document.getElementById('myLi'+i).innerHTML +='*';
		}	
	}
}

function fourth_task(){
	var firstNumber = document.getElementsByClassName('fourth_Number')[0].value +"";
	firstNumber = parseInt(firstNumber);
	if(firstNumber <= 0 || !Number.isInteger(firstNumber)){
		alert('Введите число в формату 1234567890');
		return 0;
	}
	var hour = 0;
	var minutes = 0;
	var seconds = 0;
	var result;

	if(firstNumber >= 3600){
		hour = firstNumber / 3600;
		hour =  Math.trunc(hour);
		firstNumber = firstNumber - (3600 * hour);
		alert('hour '+ hour);
		alert('first '+ firstNumber);
	}
	if(firstNumber >= 60){
		minutes = firstNumber / 60
		minutes =  Math.trunc(minutes);
		firstNumber = firstNumber - (60 * minutes);
		alert('minutes ' + minutes);
		alert('firstNumber ' + firstNumber);
	}
		seconds = firstNumber;
		alert('seconds ' + seconds);
		result = hour+' : '+minutes+' : '+seconds;
		alert(result);
	document.getElementById('clock').value = result;
}

function fifth_task(){
	var year = document.getElementsByClassName('fifth_task_year')[0].value + "";
	year = parseInt(year);
	var lineLenght = 
}

function sexth_task(){
	var monthsNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	var mounths = document.getElementsByClassName('mounths')[0].value + "";
	var date = document.getElementsByClassName('firstDate')[0].value + "";
	var year =  document.getElementsByClassName('firstYear')[0].value + "";
	var time = document.getElementsByClassName('firstTime')[0].value + "";
	alert(mounths); alert("date "+date); alert("year " + year); alert(time);
	//var hour =  document.getElementsByClassName('')[0].value + "";
	//var minutes = document.getElementsByClassName('')[0].value + "";
	//var seconds = document.getElementsByClassName('')[0].value + "";
	
	
	var test = mounths + date + year + time;
	alert(test);
	//var d = new Date(year, month, day, hours, minutes, seconds);
	var d = new Date(mounths, date, year, time);
	var n = d.getFullYear(test);
	alert(n);

}
function seven_task(){

}

