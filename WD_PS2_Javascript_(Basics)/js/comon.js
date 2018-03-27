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

	var fYear =  document.getElementsByClassName('fYear')[0].value + "";
	var fMounths = document.getElementsByClassName('fMounths')[0].value + "";
	var fDate = document.getElementsByClassName('fDate')[0].value + "";
	var fTime = document.getElementsByClassName('fTime')[0].value + "";
	
	var SYear =  document.getElementsByClassName('sYear')[0].value + "";
	var SMounths = document.getElementsByClassName('sMounths')[0].value + "";
	var SDate = document.getElementsByClassName('sDate')[0].value + "";
	var STime = document.getElementsByClassName('sTime')[0].value + "";


	var firstDate = fMounths +" " + fDate+ ", " + fYear +" "+ fTime;
	var secondDate = SMounths +" " + SDate + ", " + SYear + " " + STime;
	alert("firstDate = " + firstDate);
	alert("secondDate = " + secondDate);

    var fDataParse = Date.parse(firstDate);
    var sDataParse = Date.parse(secondDate);
    var sec = 1000;
    fDataParse = fDataParse / sec;
    sDataParse = sDataParse / sec;

    console.log(fDataParse);
    console.log(sDataParse);

    if(fDataParse >= sDataParse){
    	fDataParse-= sDataParse;
    	dateTransform(fDataParse);
    }
    else {
    	sDataParse -= fDataParse;
    	dateTransform(sDataParse);
    }
}

function dateTransform(dataParse){

	var year = 0;
	var mounths = 0;
	var day = 0;
	var hour = 0;
	var minutes = 0;
	var seconds = 0;
	var time = "";
	if(dataParse >= 31536000){
		year = dataParse / 31536000;
		year = Math.trunc(year);
		dataParse = dataParse - (31536000 * year);
	}
	if(dataParse >= 2592000){
		mounths = dataParse / 2592000;
		mounths = Math.trunc(mounths);
		dataParse = dataParse - (2592000 * mounths);
	}
	if(dataParse >= 86400){
		day = dataParse / 86400;
		day = Math.trunc(day);
		dataParse = dataParse - (86400 * day);
	}
	if(dataParse >= 3600){
		hour = dataParse / 3600;
		hour =  Math.trunc(hour);
		dataParse = dataParse - (3600 * hour);
		alert('hour '+ hour);
		alert('dataParse '+ dataParse);
	}
	if(dataParse >= 60){
		minutes = dataParse / 60
		minutes =  Math.trunc(minutes);
		dataParse = dataParse - (60 * minutes);
		alert('minutes ' + minutes);
		alert('dataParse ' + dataParse);
	}
		seconds = dataParse;
		//alert('seconds ' + seconds);
		result = year + ' ' + mounths + ' ' + day +' '+ hour+':'+minutes+':'+seconds;
		console.log(result);
		result = hour+':'+minutes+':'+seconds;
		document.getElementById('six_task_result_year').value += year;
		document.getElementById('six_task_result_mounths').value += mounths;
		document.getElementById('six_task_result_day').value += day;
		document.getElementById('six_task_result_time').value += result;		
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

function eight_tast(){
	var getValue = document.getElementsByClassName('eight_task_getValue')[0].value + "";
	getValue = parseInt(getValue);
	
	for(var i = 1; i <= getValue; i++){		
		var ul = document.createElement("ul");
		document.getElementById("eight_task_div").appendChild(ul);
		var attrUl = 'E_Ul' + i;
		ul.setAttribute('id', attrUl);

		for(var k = 1; k <= getValue; k++){
			if(k == getValue){
				var li = document.createElement("li");
				var attr  = "last_li";
				li.setAttribute('class', attr);
				document.getElementById(attrUl).appendChild(li);
			}else{
				var li = document.createElement("li");
				var attr  = "myLi" + k;
				li.setAttribute('class', attr);
				document.getElementById(attrUl).appendChild(li);
			}
		}	
	}
}

function nine_task(){

	var under = document.getElementsByClassName('under')[0].value + "";
	var flats = document.getElementsByClassName('flats')[0].value + "";
	var numberOfFloors = document.getElementsByClassName('numberOfFloors')[0].value + "";
	var apartmentNumber = document.getElementsByClassName('apartmentNumber')[0].value + "";
	var result = "";
	var numberOfFlats = 0;
	var countUnder = 1;
	var countFlors = 1;

	under = parseInt(under);
	flats = parseInt(flats);
	numberOfFloors = parseInt(numberOfFloors);
	apartmentNumber = parseInt(apartmentNumber);
	numberOfFlats = under * flats * numberOfFloors;
	alert(numberOfFlats);

	if(apartmentNumber > numberOfFlats){
		alert("такой квартиры не существует");
		return 0;
	}
	for (var i = 1; i < apartmentNumber;i++){
		if(i % flats == 0){
			countFlors++;
		}
		if(i % (numberOfFloors * flats) == 0){
			countUnder++;
			countFlors -= numberOfFloors;
		}
	}
	result = 'подьездн № ' + countUnder + ' этаж № ' + countUnder;
	alert(result);
	document.getElementById('nine_task_result').value = result;
}

function ten_task(){
	var ten_task_number = document.getElementsByClassName('ten_getNumber')[0].value + "";
	var lenghtNumber = ten_task_number.length;
	var result = 0;
	for(var i = 1; i <= lenghtNumber;i++){
		var temp = parseInt(ten_task_number[i-1]);
		result += temp;
	}
	document.getElementById('ten_result').value = result;
	alert(result);
}

function eleven_task(){
	var a = document.getElementsByClassName('eleven_task_textarea')[0].value + "";
	var check = a.replace(/https\:\/\//gi,'');
	var check = check.replace(/http\:\/\//gi,'');
	//alert(check); 
	var arr = check.split(', ');
	//alert(arr); 
	for(var i = 0; i < arr.length; i++){
		alert(arr[i]);
	}
	arr.sort();
	//alert(arr);
	document.getElementById('eleven_task_textarea_rezult').innerHTML += arr;

}