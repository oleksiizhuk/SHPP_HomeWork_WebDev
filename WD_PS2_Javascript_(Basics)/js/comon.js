var redColor = "#e84118";
var standardColor = "#c2b6b6";
var greenColor = "#4cd137";
function first_task() {
	let firstNumber = +document.getElementsByClassName('ft_firstNumber')[0].value;
	let secondNumber = +document.getElementsByClassName('ft_secondNumber')[0].value;
	if(!firstNumber || !secondNumber){
		document.getElementById('ft_result').innerText = 'заполните строки в формате чисел 1234567890';
		document.getElementsByClassName('ft_firstNumber')[0].style.borderColor = redColor;
		document.getElementsByClassName('ft_secondNumber')[0].style.borderColor = redColor;
		document.getElementById('ft_result').style.borderColor = standardColor;
		return;
	}
	let result = 0;
	let end = 0;
	let counter = 0;
	if(secondNumber > firstNumber){
		counter = firstNumber;
		end = secondNumber;
	}
	else{
		counter = secondNumber;
		end = firstNumber;
	}
	for(let i = counter; i <= end;i++){
		result += i;
	}
	document.getElementsByClassName('ft_firstNumber')[0].style.borderColor = standardColor;
	document.getElementsByClassName('ft_secondNumber')[0].style.borderColor = standardColor;
	document.getElementById('ft_result').style.borderColor = greenColor;
	document.getElementById('ft_result').innerText = result;
}

function second_task() {
	let firstNumber = +document.getElementsByClassName('st_firstNumber')[0].value;
	let secondNumber = +document.getElementsByClassName('st_secondNumber')[0].value;
	let result = 0;
	if(firstNumber > secondNumber){
		document.getElementById('st_result').innerText = "первое число должно быть меньше второго";
		document.getElementsByClassName('st_firstNumber')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('st_secondNumber')[0].style.borderColor = "#e84118";
		document.getElementById('st_result').style.borderColor = "#c2b6b6";
		return;
	}
	if(!Number.isInteger(firstNumber) || !Number.isInteger(secondNumber)){
		document.getElementById('st_result').innerText = "Введите число в формату 1234567890";
		document.getElementsByClassName('st_firstNumber')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('st_secondNumber')[0].style.borderColor = "#e84118";
		document.getElementById('st_result').style.borderColor = "#c2b6b6";
		return;
	}
	for(let i = firstNumber; i <= secondNumber; i++){
		let check = Math.abs(i);
		if(check % 10 == 2 || check % 10 == 3 || check % 10 == 7){
			result += i;
		}
	}
	document.getElementsByClassName('st_firstNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementsByClassName('st_secondNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementById('st_result').style.borderColor = "#4cd137";
	document.getElementById('st_result').innerText = result;
}

function third_task(){// одним свором ***
	let container = document.getElementById('tt_list');
	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}
	let firstNumber = document.getElementsByClassName('tt_firstNumber')[0].value + "";
	firstNumber = parseInt(firstNumber);
	if(!Number.isInteger(firstNumber)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('tt_firstNumber')[0].style.borderColor = "#e84118";
		return;
	}
	if(firstNumber > 300 || firstNumber <= 0){
		alert("введите число меньше от 1 до 300!!!");
		document.getElementsByClassName('tt_firstNumber')[0].style.borderColor = "#e84118";
		return;
	}
	let ul = document.createElement("ul");
	ul.setAttribute('id', 'myUl');
	document.getElementById("tt_list").appendChild(ul);
	let star = "";
	for(let i = 1; i <= firstNumber; i++){
		let li = document.createElement("li"); 
		id  = "myLi" + i;
		li.setAttribute('id', id);
		ul.appendChild(li);
		for(let k = i - 1; k < i; k++){
			star += "*" 
		}	
		document.getElementById('myLi'+i).innerText = star;
	}
	document.getElementsByClassName('tt_firstNumber')[0].style.borderColor = "#4cd137";
}

function fourth_task(){
	let firstNumber = +document.getElementsByClassName('fourT_Number')[0].value;
	if(firstNumber <= 0 || !Number.isInteger(firstNumber)){
		document.getElementById('fourTaskResult').innerText = 'Введите число в формату 1234567890';
		document.getElementsByClassName('fourT_Number')[0].style.borderColor = "#e84118";
		return;
	}
	let hour = 0;
	let minutes = 0;
	let seconds = 0;
	let result = 0;

	if(firstNumber >= 3600){
		hour = firstNumber / 3600;
		hour =  Math.trunc(hour);
		firstNumber = firstNumber - (3600 * hour);
	}
	if(firstNumber >= 60){
		minutes = firstNumber / 60
		minutes =  Math.trunc(minutes);
		firstNumber = firstNumber - (60 * minutes);
	}
		seconds = firstNumber;
		result = hour + ':' + minutes + ':' + seconds;
		document.getElementById('fourT_clock').value = result;
		document.getElementsByClassName('fourT_Number')[0].style.borderColor = "#4cd137";
}

function fifth_task(){
	let year = +document.getElementsByClassName('fifth_task_year')[0].value;
	let result = "";
	if(year <= 0 || !Number.isInteger(year)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('fifth_task_year')[0].style.borderColor = "#e84118";
		return;
	}
	let number = year.toString();
	let numberLenght = number.length;
	if(number[numberLenght -1] == 1){
		if(number[numberLenght - 2] == 1){
			result = year + " лет";
			document.getElementById('fiftT_result').value = result;
		}else{
			result = year + " год";
			document.getElementById('fiftT_result').value = result;
		}
	}
	if(number[numberLenght -1] == 2 || number[numberLenght -1] == 3 || number[numberLenght -1] == 4){
		if(year >= 11 && year < 20){
		 	result = year + " лет";
			document.getElementById('fiftT_result').value = result;
		}
		else{
			result = year + " года";
			document.getElementById('fiftT_result').value = result;
		}
	}
	if(number[numberLenght -1] == 0){
		result = year + " лет";
		document.getElementById('fiftT_result').value = result;
	}
	document.getElementsByClassName('fifth_task_year')[0].style.borderColor = "#c2b6b6";
	document.getElementById('fiftT_result').style.borderColor = "#4cd137";
}

function sexth_task(){

	let firstNumber = document.getElementsByClassName('sixTaskFirstNumber')[0].value + "";
	let secondNumber = document.getElementsByClassName('sixTaskSecondNumber')[0].value + "";

    let fDataParse = Date.parse(firstNumber);
    let sDataParse = Date.parse(secondNumber);
    let sec = 1000;
    fDataParse = fDataParse / sec;
    sDataParse = sDataParse / sec;
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
	let year = 0;
	let mounths = 0;
	let day = 0;
	let hour = 0;
	let minutes = 0;
	let seconds = 0;
	let time = "";
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
	if(dataParse >= 3600){ // hour
		hour = dataParse / 3600;
		hour =  Math.trunc(hour);
		dataParse = dataParse - (3600 * hour);
	}
	if(dataParse >= 60){ // min
		minutes = dataParse / 60
		minutes =  Math.trunc(minutes);
		dataParse = dataParse - (60 * minutes);
	}
		seconds = dataParse;
		result = year + ' года, ' + mounths + ' месяц, ' + day +' дней, '+ hour+
		' часов, '+minutes+' минут, '+seconds + " секунд";
		document.getElementById("sixTaskResultP").innerText = result;
}

function seven_task(){
	let date = document.getElementsByClassName('seven_task_data')[0].value + "";

	let d = new Date(date);
    let day = d.getDate();
    let m = new Date(date);
    let mounths = m.getMonth() + 1;
    if(m == "Invalid Date"){
    	alert("неверный формат ввода");
    	return;
    }
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
	let getValuefirst = +document.getElementsByClassName('eightTaskGetValue')[0].value;
	let getValueSecond = +document.getElementsByClassName('eightTaskGetValue')[1].value;
	if(getValuefirst > 50 || getValuefirst <= 1 || getValueSecond > 50 || getValueSecond <= 1 || !Number.isInteger(getValuefirst) || !Number.isInteger(getValueSecond)){
		document.getElementById('eightTaskMessege').innerText = "числа от 2 до 50!!!";
		document.getElementsByClassName('eightTaskGetValue')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('eightTaskGetValue')[1].style.borderColor = "#e84118";
		return;
	}
	let container = document.getElementById('eight_task_div');
	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}
	for(let i = 1; i <= getValuefirst; i++){		
		let ul = document.createElement("ul");
		document.getElementById("eight_task_div").appendChild(ul);
		let attrUl = 'E_Ul' + i;
		ul.setAttribute('id', attrUl);

		for(let k = 1; k <= getValueSecond; k++){
			let li = document.createElement("li");
			let attr  = "last_li";
			li.setAttribute('class', attr);
			document.getElementById(attrUl).appendChild(li);
		}	
	}
	document.getElementsByClassName('eightTaskGetValue')[0].style.borderColor = "#4cd137";
	document.getElementById('eightTaskMessege').innerText = "";
}

function nine_task(){
	let under = +document.getElementsByClassName('under')[0].value;
	let flats = +document.getElementsByClassName('flats')[0].value;
	let numberOfFloors = +document.getElementsByClassName('numberOfFloors')[0].value;
	let apartmentNumber = +document.getElementsByClassName('apartmentNumber')[0].value;
	let result = "";
	let numberOfFlats = 0;
	let countUnder = 1;
	let countFlors = 1;

	if(!Number.isInteger(under) || !Number.isInteger(flats) ||!Number.isInteger(numberOfFloors) || !Number.isInteger(apartmentNumber)){
		alert('Введите число в формату 1234567890');
		document.getElementsByClassName('under')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('flats')[0].style.borderColor = "#e84118";
		document.getElementsByClassName('numberOfFloors')[0].style.borderColor = "#e84118";
		return;
	}
	numberOfFlats = under * flats * numberOfFloors;

	if(apartmentNumber > numberOfFlats || apartmentNumber <= 0 ||!Number.isInteger(apartmentNumber)){
		alert("такой квартиры не существует");
		return;
	}
	for (let i = 1; i < apartmentNumber;i++){
		if(i % flats == 0){
			countFlors++;
		}
		if(i % (numberOfFloors * flats) == 0){
			countUnder++;
			countFlors -= numberOfFloors;
		}
	}
	result = 'подьездн № ' + countUnder + ' этаж № ' + countFlors;
	document.getElementById('nine_task_results').innerText = result;

	document.getElementsByClassName('under')[0].style.borderColor = "#c2b6b6";
	document.getElementsByClassName('flats')[0].style.borderColor = "#c2b6b6";
	document.getElementsByClassName('numberOfFloors')[0].style.borderColor = "#c2b6b6";
	document.getElementById('nine_task_results').style.borderColor = "#4cd137";
}

function ten_task(){ 
	let firstNumber = document.getElementsByClassName('ten_getNumber')[0].value + "";
	let arr = firstNumber.split('');
	let check = 0;
	check = parseInt(firstNumber);
	if(!Number.isInteger(check)){
		alert("вводите только цыфры!");
		document.getElementsByClassName('ten_getNumber')[0].style.borderColor = "#e84118";
		return;
	}
	let ress = 0;
	 ress = arr.reduce(function(acc, item){
		return acc + item * 1;
	}, 0);
	document.getElementById('ten_result').innerText = ress;
	document.getElementsByClassName('ten_getNumber')[0].style.borderColor = "#c2b6b6";
	document.getElementById('ten_result').style.borderColor = "#4cd137";
}

function eleven_task(){
	let clear = document.getElementsByClassName('eleven_task_textarea')[0].value + "";
	clear.innerText = "";
	let a = document.getElementsByClassName('eleven_task_textarea')[0].value + "";
	let check = a.replace(/https?\:\/\//gi,'');
	let arr = check.split(',');
	console.log(arr);
	arr.sort();
	for(let i = 0; i < arr.length; i++){
		arr[i] += "\n";
	}
	document.getElementById('eleven_task_textarea_rezult').innerText = arr;
}

function test(){
	let arr = ["1","1","1","1"];
	let ress = arr.reduce(function(acc, item){
		return acc + item;
	}, 0);
	alert(ress);
}

//arr.filter(link => link);