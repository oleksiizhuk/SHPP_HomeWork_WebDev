function first_task() {
	var firstNumber = document.getElementsByClassName('firstNumber')[0].value + "";
	var secondNumber = document.getElementsByClassName('secondNumber')[0].value + "";
	firstNumber = parseInt(firstNumber);
	secondNumber = parseInt(secondNumber);
	if(firstNumber <= 0 || !Number.isInteger(firstNumber)){
		alert('Введите число в формату 1234567890');
		return 0;
	}
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
	if(firstNumber <= 0 || !Number.isInteger(firstNumber)){
		alert('Введите число в формату 1234567890');
		return 0;
	}
	var number = year.toString();
	var numberLenght = number.length;
	if(number[numberLenght -1] == 1){
		alert(year + "год");
	}
	if(number[numberLenght -1] == 2 || number[numberLenght -1] == 3 || number[numberLenght -1] == 4){
		if(year >11 && year < 20){
		 	alert(year + " лет");
		}
		else{
			alert(year + " года");
		}
	}
	if(number[numberLenght -1] == 0){
		alert(year + "лет");
	}
}

function sexth_task(){
	var monthsNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	var testMonthsNumber = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
	var mounths = document.getElementsByClassName('mounths')[0].value + "";
	var date = document.getElementsByClassName('firstDate')[0].value + "";
	var year =  document.getElementsByClassName('firstYear')[0].value + "";
	var time = document.getElementsByClassName('firstTime')[0].value + "";
	//alert(mounths); alert("date " + date); alert("year " + year); alert(time);
	var test = mounths +" " + date+ ", " + year +" "+ time;
	alert("test = " + test);

    var n = Date.parse(test);
    var sec = 1000;
    n = n / sec;
    console.log(n);

}
// 1000 ms 60000 sec 1440000 min 3600000 hour 86400000 day 31536000000 year

function seven_task(){
	var date = document.getElementsByClassName('seven_task_data')[0].value + "";
	//alert(date);
	
	var t = Date.now();// 1000 ms 60000 sec 1440000 min 3600000 hour 86400000 day 31536000000 year
	var y = Math.round(t / 86400000);

	var minutes = 1000 * 60;
	var hours = minutes * 60;
	var days = hours * 24;
	var years = days * 365;
	var t = Date.now();
	alert("t " + t);

	var y = Math.round(t / days);
	alert(y);


}

