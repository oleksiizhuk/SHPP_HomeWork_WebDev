function first_task() {
	var firstNumber = document.getElementsByClassName('ft_firstNumber')[0].value + "";
	var secondNumber = document.getElementsByClassName('ft_secondNumber')[0].value + "";
	firstNumber = parseInt(firstNumber);
	secondNumber = parseInt(secondNumber);
	if(firstNumber > secondNumber){
		alert("первое число не может быть больше второго");
		document.getElementsByClassName('ft_firstNumber')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('ft_secondNumber')[0].style.borderColor = "#e84118";
		document.getElementById('ft_result').style.borderColor = "#c2b6b6";
		return 0;
	}
	if(!Number.isInteger(firstNumber) || !Number.isInteger(secondNumber)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('ft_firstNumber')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('ft_secondNumber')[0].style.borderColor = "#e84118";
		document.getElementById('ft_result').style.borderColor = "#c2b6b6";
		return 0;
	}
	var result = 0;
	for(var i = firstNumber; i <= secondNumber;i++){
		result = result + i;
	}
	document.getElementsByClassName('ft_firstNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementsByClassName('ft_secondNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementById('ft_result').style.borderColor = "#4cd137";
	document.getElementById('ft_result').value = result;
}

function second_task() {
	var firstNumber = document.getElementsByClassName('st_firstNumber')[0].value + "";
	var secondNumber = document.getElementsByClassName('st_secondNumber')[0].value + "";
	var result = 0;
	firstNumber = parseInt(firstNumber);
	secondNumber = parseInt(secondNumber);
	if(firstNumber > secondNumber){
		alert("первое число должно быть меньше второго");
		document.getElementsByClassName('st_firstNumber')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('st_secondNumber')[0].style.borderColor = "#e84118";
		document.getElementById('st_result').style.borderColor = "#c2b6b6";
		return 0;
	}
	if(!Number.isInteger(firstNumber) || !Number.isInteger(secondNumber)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('st_firstNumber')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('st_secondNumber')[0].style.borderColor = "#e84118";
		document.getElementById('st_result').style.borderColor = "#c2b6b6";
		return 0;
	}
	for(var i = firstNumber; i <= secondNumber; i++){
		var number = i.toString();
		var lengthNumber = number.length;

		if(number[lengthNumber-1] == "2" || number[lengthNumber-1] == 3 || number[lengthNumber-1]==7){
			result = result + i;	
		}
	}
	document.getElementsByClassName('st_firstNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementsByClassName('st_secondNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementById('st_result').style.borderColor = "#4cd137";
	document.getElementById('st_result').value = result;
}

function third_task(){
	var container = document.getElementById('tt_list');
	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}
	var firstNumber = document.getElementsByClassName('tt_firstNumber')[0].value + "";
	firstNumber = parseInt(firstNumber);
	if(!Number.isInteger(firstNumber)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('tt_firstNumber')[0].style.borderColor = "#e84118";
		return 0;
	}
	if(firstNumber > 500 || firstNumber <= 0){
		alert("введите число меньше от 1 до 500!!!");
		document.getElementsByClassName('tt_firstNumber')[0].style.borderColor = "#e84118";
		return 0;
	}
	var ul = document.createElement("ul");
	ul.setAttribute('id', 'myUl');
	document.getElementById("tt_list").appendChild(ul);
	for(var i = 1; i <= firstNumber; i++){
		var li = document.createElement("li");
		id  = "myLi" + i;
		li.setAttribute('id', id);
		document.getElementById('myUl').appendChild(li);
		for(var k = 0; k < i; k++){
			document.getElementById('myLi'+i).innerHTML +='*';
		}	
	}
	document.getElementsByClassName('tt_firstNumber')[0].style.borderColor = "#4cd137";
}

function fourth_task(){
	var firstNumber = document.getElementsByClassName('fourT_Number')[0].value +"";
	firstNumber = parseInt(firstNumber);
	if(firstNumber <= 0 || !Number.isInteger(firstNumber)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('fourT_Number')[0].style.borderColor = "#e84118";

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
		document.getElementById('fourT_clock').value = result;
		document.getElementsByClassName('fourT_Number')[0].style.borderColor = "#4cd137";
}

function fifth_task(){
	var year = document.getElementsByClassName('fifth_task_year')[0].value + "";
	year = parseInt(year);
	var result = "";
	if(year <= 0 || !Number.isInteger(year)){//#e84118
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('fifth_task_year')[0].style.borderColor = "#e84118";
		return 0;
	}
	var number = year.toString();
	var numberLenght = number.length;
	if(number[numberLenght -1] == 1){
		alert(year + "год");
		result = year + " год";
		document.getElementById('fiftT_result').value = result;
	}
	if(number[numberLenght -1] == 2 || number[numberLenght -1] == 3 || number[numberLenght -1] == 4){
		if(year >= 11 && year < 20){
		 	alert(year + " лет");
		 	result = year + " лет";
			document.getElementById('fiftT_result').value = result;
		}
		else{
			alert(year + " года");
			result = year + " года";
			document.getElementById('fiftT_result').value = result;
		}
	}
	if(number[numberLenght -1] == 0){
		alert(year + "лет");
		result = year + " лет";
		document.getElementById('fiftT_result').value = result;
	}
	document.getElementsByClassName('fifth_task_year')[0].style.borderColor = "#c2b6b6";
	document.getElementById('fiftT_result').style.borderColor = "#4cd137";
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
	console.log("firstDate = " + firstDate);
	console.log("secondDate = " + secondDate);

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
		result = year + ' ' + mounths + ' ' + day +' '+ hour+':'+minutes+':'+seconds;
		console.log(result);
		result = hour+':'+minutes+':'+seconds;
		document.getElementById('six_task_result_year').value += year;
		document.getElementById('six_task_result_mounths').value += mounths;
		document.getElementById('six_task_result_day').value += day;
		document.getElementById('six_task_result_time').value += result;		
}

function seven_task(){
	var date = document.getElementsByClassName('seven_task_data')[0].value + "";
	var arr = date.split('-');
	var day = parseInt(arr[2]);
	var mounths = parseInt(arr[1]);
	if (mounths==1 && day>=20 || mounths==2 && day<=18){  
		document.getElementById("znak").src="img/водолей.png";
	}
	else if (mounths==2 && day>=19 || mounths==3 && day<=20){
		document.getElementById("znak").src="img/рыбы.png";
	} 
	else if (mounths==3 && day>=21 || mounths==4 && day<=19){
		document.getElementById("znak").src="img/Оввен.png";
	} 
	else if (mounths==4 && day>=20 || mounths==5 && day<=20){
		document.getElementById("znak").src="img/телец.png";
	}
	else if (mounths==5 && day>=21 || mounths==6 && day<=21){
		document.getElementById("znak").src="img/близнецы.png";
	}
	else if (mounths==6 && day>=22 || mounths==7 && day<=22){
		document.getElementById("znak").src="img/рак.png";
	}
	else if (mounths==7 && day>=23 || mounths==8 && day<=22){
		document.getElementById("znak").src="img/Лев.png";
	}
	else if (mounths==8 && day>=23 || mounths==9 && day<=22){
		document.getElementById("znak").src="img/дева.png";
	}
	else if (mounths==9 && day>=23 || mounths==10 && day<=22){
		document.getElementById("znak").src="img/весы.png";
	}
	else if (mounths==10 && day>=23 || mounths==11 && day<=21){
		document.getElementById("znak").src="img/скорпион.png";
	}
	else if (mounths==11 && day>=22 || mounths==12 && day<=21){
		document.getElementById("znak").src="img/стрелец.png";
	}
	else if (mounths==12 && day>=22 || mounths==1 && day<=19){
		document.getElementById("znak").src="img/козерог.png";
	} 
}

function eight_tast(){

	var getValue = document.getElementsByClassName('eight_task_getValue')[0].value + "";
	getValue = parseInt(getValue);

	if(getValue > 50 || getValue <= 4){
		alert("введите число меньше от 4 до 50!!!");
		document.getElementsByClassName('eight_task_getValue')[0].style.borderColor = "#e84118";
		return 0;
	}
	var container = document.getElementById('eight_task_div');
	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}
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
	document.getElementsByClassName('eight_task_getValue')[0].style.borderColor = "#4cd137";
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
	if(!Number.isInteger(under) || !Number.isInteger(flats) ||!Number.isInteger(numberOfFloors) || !Number.isInteger(apartmentNumber)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('under')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('flats')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('numberOfFloors')[0].style.borderColor = "#e84118";
		return 0;
	}
	numberOfFlats = under * flats * numberOfFloors;
	alert(numberOfFlats);


	if(apartmentNumber > numberOfFlats || apartmentNumber <= 0 ||!Number.isInteger(apartmentNumber)){
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
	result = 'подьездн № ' + countUnder + ' этаж № ' + countFlors;
	alert(result);
	document.getElementById('nine_task_result').value = result;

	document.getElementsByClassName('under')[0].style.borderColor = "#c2b6b6";
	document.getElementsByClassName('flats')[0].style.borderColor = "#c2b6b6";
	document.getElementsByClassName('numberOfFloors')[0].style.borderColor = "#c2b6b6";
	document.getElementById('nine_task_result').style.borderColor = "#4cd137";
}

function ten_task(){
	let ten_task_number = document.getElementsByClassName('ten_getNumber')[0].value + "";
	let arr = ten_task_number.split('');
	let check = 0;
	let lenghtNumber = ten_task_number.length;
	check = parseInt(ten_task_number);
	if(!Number.isInteger(check)){
		alert("вводите только цыфры!");
		document.getElementsByClassName('ten_getNumber')[0].style.borderColor = "#e84118";
		return 0;
	}
	let ress = 0;
	 ress = arr.reduce(function(acc, item){
		return acc + item * 1;
	}, 0);
	document.getElementById('ten_result').value = ress;
	document.getElementsByClassName('ten_getNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementById('ten_result').style.borderColor = "#4cd137";
}

function eleven_task(){
	var clear = document.getElementsByClassName('eleven_task_textarea')[0].value + "";
	clear.innerHTML = "";
	var a = document.getElementsByClassName('eleven_task_textarea')[0].value + "";
	var check = a.replace(/https?\:\/\//gi,'');
	var arr = check.split(', ');
	arr.sort();
	document.getElementById('eleven_task_textarea_rezult').innerHTML = arr.join('\n');
}

function test(){
	let arr = ["1","1","1","1"];
	let ress = arr.reduce(function(acc, item){
		return acc + item*1;
	}, 0);
	alert(ress);
}
