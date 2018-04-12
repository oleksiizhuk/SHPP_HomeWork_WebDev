var redColor = "#e84118";
var standardColor = "#c2b6b6";
var greenColor = "#4cd137";
var numberFormatMassege = `Вводите в строку только числа`;
function first_task() { 
	let firstNumber = +document.getElementById(`ft_firstNumber`).value;
	let secondNumber = +document.getElementById(`ft_secondNumber`).value;
	if(!firstNumber || !secondNumber){
		document.getElementById(`ft_result`).innerText = numberFormatMassege;
		document.getElementById(`ft_firstNumber`).classList.add(`userError`);
		document.getElementById(`ft_secondNumber`).classList.add(`userError`);
		document.getElementById(`ft_result`).classList.add(`standardСolor`);
		return;
	}
	if (firstNumber > secondNumber){
		[secondNumber, firstNumber] = [firstNumber, secondNumber];
	}
	let result = 0;
	for(let i = firstNumber; i <= secondNumber;i++){
		result += i;
	}
	document.getElementById(`ft_firstNumber`).classList.add(`standardСolor`);
	document.getElementById(`ft_secondNumber`).classList.add(`standardСolor`);
	document.getElementById(`ft_result`).classList.add(`userEnteredCorrectly`);
	document.getElementById(`ft_result`).innerText = result;
}

function second_task() {
	let firstNumber = +document.getElementById('st_firstNumber').value;
	let secondNumber = +document.getElementById('st_secondNumber').value;
	if(!firstNumber || !secondNumber){
		document.getElementById('st_result').innerText = numberFormatMassege;
		document.getElementById('st_firstNumber').classList.add('userError');
		document.getElementById('st_secondNumber').classList.add('userError');
		document.getElementById('st_result').classList.add('standardСolor');
		return;
	}
	if (firstNumber > secondNumber){
		[secondNumber, firstNumber] = [firstNumber, secondNumber];
	}
	let result = 0;
	for(let i = firstNumber; i <= secondNumber; i++){
		let removeMinus = Math.abs(i); 
		const check = removeMinus % 10;
		if(check === 2 || check === 3 || check === 7){
			result += i;
		}
	}
	document.getElementById('st_firstNumber').classList.add('standardСolor');
	document.getElementById('st_secondNumber').classList.add('standardСolor');
	document.getElementById('st_result').classList.add('userEnteredCorrectly');
	document.getElementById('st_result').innerText = result;
}

function third_task(){// одним свором ***
	//container.innerHtml = "";
	let container = document.getElementById(`tt_list`);
	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}

	let firstNumber = +document.getElementById(`tt_firstNumber`).value;
	if(!firstNumber){
		alert(numberFormatMassege);
		document.getElementById(`tt_firstNumber`).classList.add(`userError`);
		return;
	}
	if(firstNumber > 300 || firstNumber <= 0){
		alert(`введите число меньше от 1 до 300!!!`);
		document.getElementById('tt_firstNumber').classList.add('userError');
		return;
	}
	let ul = document.createElement("ul");
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
		document.getElementById('myLi'+i).innerText = star; // доделать
	}
	document.getElementById(`tt_firstNumber`).classList.add(`userEnteredCorrectly`);
}

function fourth_task(){
	let firstNumber = +document.getElementById('fourT_Number').value;
	if(firstNumber <= 0 || !firstNumber){
		document.getElementById(`fourTaskResult`).innerText = numberFormatMassege;
		document.getElementById('fourT_Number').classList.add(`userError`);
		return;
	}
	let hour, minutes,result;
	const secondPerHour = 3600;
	if(firstNumber >= secondPerHour){
		
		hour = firstNumber / secondPerHour;
		hour =  Math.trunc(hour);
		firstNumber = firstNumber - (secondPerHour * hour);
	}
	const secondPerMinutes = 60;
	if(firstNumber >= secondPerMinutes){
		minutes = firstNumber / secondPerMinutes
		minutes =  Math.trunc(minutes);
		firstNumber = firstNumber - (secondPerMinutes * minutes);
	}
		result = hour + ':' + minutes + ':' + firstNumber;
		document.getElementById('fourT_clock').value = result;
		document.getElementById('fourT_Number').classList.add(`userEnteredCorrectly`);
}

function fifth_task(){ // добавить ноль  /// доделать на 105
	let year = +document.getElementById(`fifth_task_year`).value;
	if (year <= 0 || !year){
		alert(numberFormatMassege);
		document.getElementById('fifth_task_year').classList.add(`userError`);
		return;
	}
	let test = year % 100;
	alert(test);
	let number = test.toString();
	let numberLenght = number.length;
	let result = "";
	if(year === 0){
		result = year + " лет";
		document.getElementById(`fiftT_result`).value = result;
		return;
	}
	if (number[numberLenght -1] == 1){
		if(number[numberLenght - 2] == 1){
			result = year + " лет";
			document.getElementById('fiftT_result').value = result;
			return;
		}else{
			result = year + " год";
			document.getElementById('fiftT_result').value = result;
			return;
		}
	}
	if (number[numberLenght -1] == 2 || number[numberLenght -1] == 3 || number[numberLenght -1] == 4){
		if (test >= 11 && test < 20){
		 	result = year + " лет";
			document.getElementById('fiftT_result').value = result;
			return;
		} else {
			result = year + " года";
			document.getElementById('fiftT_result').value = result;
			return;
		}
	} else {
		result = year + " лет";
		document.getElementById('fiftT_result').value = result;
		return;
	}
	if (number[numberLenght -1] == 0){
		result = year + " лет";
		document.getElementById('fiftT_result').value = result;
	}
}

function test(){
	let year = +document.getElementById(`fifth_task_year`).value;
	if (year <= 0 || !year){
		alert(numberFormatMassege);
		document.getElementById('fifth_task_year').classList.add(`userError`);
		return;
	}
	let number = year.toString();
	let numberLenght = number.length;
	let result = "";


	if (year == 1){
		if(number[numberLenght - 2] == 1){
			result = year + " лет";
			document.getElementById('fiftT_result').value = result;
		}else{
			result = year + " год";
			document.getElementById('fiftT_result').value = result;
		}
	}
	if (number[numberLenght -1] == 2 || number[numberLenght -1] == 3 || number[numberLenght -1] == 4){
		if (year >= 11 && year < 20){
		 	result = year + " лет";
			document.getElementById('fiftT_result').value = result;
		} else {
			result = year + " года";
			document.getElementById('fiftT_result').value = result;
			return;
		}
	} 
	if (number[numberLenght -1] == 0){
		result = year + " лет";
		document.getElementById('fiftT_result').value = result;
	}
	document.getElementById('fifth_task_year').classList.add(`standardСolor`);
	document.getElementById('fiftT_result').classList.add(`userEnteredCorrectly`);
}

function sixth_task(){ // считать высокосные года 

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
//date = new date();
//datewho = new date();
//yeardiff = date.getYear()

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

function eight_tast(){// сделать что бы хавало 1 х 1  // вывести ДОМ из цыкла
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

function nine_task(){//сделать что бы знать куда вводить
	let entrance = +document.getElementsByClassName('under')[0].value;
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
		if(i % flats === 0){
			countFlors++;
		}
		if(i % (numberOfFloors * flats) === 0){ // вывести в константу 
			countUnder++;
			countFlors -= numberOfFloors;
		}
	}
	result = 'подьезд № ' + countUnder + ' этаж № ' + countFlors;
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

function eleven_task(){// не сортирует 
	let clear = document.getElementsByClassName('eleven_task_textarea')[0].value + "";
	clear.innerText = "";
	let a = document.getElementsByClassName('eleven_task_textarea')[0].value + "";
	let check = a.replace(/https?\:\/\//gi,'');
	let arr = check.split(',').arr.sort();
	for(let i = 0; i < arr.length; i++){
		arr[i] += "\n";
	}
	document.getElementById('eleven_task_textarea_rezult').innerText = arr;
}

function test(){
	let arr = ["https://facebook.com","https://facebook.com","1","https://google.com","https://google.com"];
	let ress = arr.reduce(function(acc, item){
		return acc + item;
	}, 0);
	alert(ress);
}

//arr.filter(link => link);