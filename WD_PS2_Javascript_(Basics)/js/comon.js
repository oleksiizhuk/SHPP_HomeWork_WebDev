var redColor = "#e84118";
var standardColor = "#c2b6b6";
var greenColor = "#4cd137";
var numberFormatMassege = `Вводите в строку только числа`;
function firstTask() { 
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

function secondTask() {
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

function thirdTask(){// одним свором ***
	//container.innerHtml = "";
	let container = document.getElementById(`thirdTaskList`);
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
	document.getElementById("thirdTaskList").appendChild(ul);
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

function fourthTask(){
	let firstNumber = +document.getElementById('getUserSeconds').value;
	if(firstNumber <= 0 || !firstNumber){
		document.getElementById(`fourTaskResult`).innerText = numberFormatMassege;
		document.getElementById('getUserSeconds').classList.add(`userError`);
		return;
	}
	let hour = 0, minutes = 0,result;
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
		document.getElementById('timeResult').value = result;
		document.getElementById('getUserSeconds').classList.add(`userEnteredCorrectly`);
}

function fifthTask(){ 
	let year = +document.getElementById(`fifth_task_year`).value;
	if (year <= 0 || !year){
		alert(numberFormatMassege);
		document.getElementById('fifth_task_year').classList.add(`userError`);
		return;
	}
	let removeUnnecessary = year % 100;
	let number = removeUnnecessary.toString();
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

function sixthTask(){ // считать высокосные года 

	let firstNumber = document.getElementById('sixTaskFirstNumber').value + "";
	let secondNumber = document.getElementById('sixTaskSecondNumber').value + "";
    let date1 = Date.parse(firstNumber);
    let date2 = Date.parse(secondNumber);
    
    if (date2 > date1){
    	[date1, date2] = [date2, date1];
    }
    let differenceBetwennTwoDates = date1 - date2;
    let temp = new Date(differenceBetwennTwoDates);
    let temp2 = new Date(0);
    let yearRess = temp.getFullYear(differenceBetwennTwoDates) - temp2.getFullYear(0);
    console.log(yearRess);

    const year = 31536000000;
    differenceBetwennTwoDates = differenceBetwennTwoDates % year;
    alert(differenceBetwennTwoDates);
    let monthRess = temp.getMonth(differenceBetwennTwoDates) - temp2.getMonth(0);
    console.log(monthRess);

    const month = 2592000000;
    differenceBetwennTwoDates = differenceBetwennTwoDates % month;
    let dayRess = temp.getDay(differenceBetwennTwoDates) - temp2.getDay(0);
    console.log(dayRess);

    const day = 86400000;
    differenceBetwennTwoDates = differenceBetwennTwoDates % day;
    let hourRess = temp.getHours(differenceBetwennTwoDates) - temp2.getHours(0);
    console.log(hourRess);

    const hour = 86400000;
    differenceBetwennTwoDates = differenceBetwennTwoDates % hour;
    let minutesRess = temp.getMinutes(differenceBetwennTwoDates) - temp2.getMinutes(0);
    console.log(minutesRess);

    const minutes = 3600000;
    differenceBetwennTwoDates = differenceBetwennTwoDates % minutes;
    let secondsRess = temp.getSeconds(differenceBetwennTwoDates) - temp2.getSeconds(0);
    console.log(secondsRess);

    let result = yearRess + ' года, ' + monthRess + ' месяц, ' 
    + dayRess + ' дней, '+ hourRess + ' часов, ' + minutesRess +' минут, '
     + secondsRess + ' секунд ';
	document.getElementById("sixTaskResultP").innerText = result;
}

function seven_task(){
	let date = document.getElementById(`seven_task_data`).value + "";
	const zodiacSign = "zodiacSign";
	let d = new Date(date);
    let day = d.getDate();
    let m = new Date(date);
    let mounths = m.getMonth() + 1;
    if(m == "Invalid Date"){
    	alert("неверный формат ввода");
    	return;
    }
	if (mounths==1 && day>=20 || mounths==2 && day<=18){  
		document.getElementById(zodiacSign).src="img/водолей.png";
	}
	else if (mounths==2 && day>=19 || mounths==3 && day<=20){
		document.getElementById(zodiacSign).src="img/рыбы.png";
	} 
	else if (mounths==3 && day>=21 || mounths==4 && day<=19){
		document.getElementById(zodiacSign).src="img/Оввен.png";
	} 
	else if (mounths==4 && day>=20 || mounths==5 && day<=20){
		document.getElementById(zodiacSign).src="img/телец.png";
	}
	else if (mounths==5 && day>=21 || mounths==6 && day<=21){
		document.getElementById(zodiacSign).src="img/близнецы.png";
	}
	else if (mounths==6 && day>=22 || mounths==7 && day<=22){
		document.getElementById(zodiacSign).src="img/рак.png";
	}
	else if (mounths==7 && day>=23 || mounths==8 && day<=22){
		document.getElementById(zodiacSign).src="img/Лев.png";
	}
	else if (mounths==8 && day>=23 || mounths==9 && day<=22){
		document.getElementById(zodiacSign).src="img/дева.png";
	}
	else if (mounths==9 && day>=23 || mounths==10 && day<=22){
		document.getElementById(zodiacSign).src="img/весы.png";
	}
	else if (mounths==10 && day>=23 || mounths==11 && day<=21){
		document.getElementById(zodiacSign).src="img/скорпион.png";
	}
	else if (mounths==11 && day>=22 || mounths==12 && day<=21){
		document.getElementById(zodiacSign).src="img/стрелец.png";
	}
	else if (mounths==12 && day>=22 || mounths==1 && day<=19){
		document.getElementById(zodiacSign).src="img/козерог.png";
	} 
}

function eight_tast(){// сделать что бы хавало 1 х 1  // вывести ДОМ из цыкла
	let getValuefirst = +document.getElementById('eightTaskGetValue').value;
	let getValueSecond = +document.getElementById('eightTaskGetSecondValue').value;
	if(getValuefirst > 50 || getValuefirst <= 0 || getValueSecond > 50 || getValueSecond <= 0 || !getValuefirst || !getValueSecond){
		document.getElementById('eightTaskMessege').innerText = "числа от 1 до 50!!!";
		document.getElementById('eightTaskGetValue').classList.add(`userError`);
		document.getElementById('eightTaskGetSecondValue').classList.add(`userError`);
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
	document.getElementById('eightTaskGetValue').classList.add(`userEnteredCorrectly`) = "#4cd137";
	document.getElementById('eightTaskGetSecondValue').classList.add(`userEnteredCorrectly`) = "#4cd137";
	document.getElementById('eightTaskMessege').innerText = "";
}

function nine_task(){
	let entrance = +document.getElementById(`entrance`).value;
	let flats = +document.getElementById(`flats`).value;
	let numberOfFloors = +document.getElementById(`numberOfFloors`).value;
	let apartmentNumber = +document.getElementById(`apartmentNumber`).value;
	
	if (!entrance || !flats || !numberOfFloors || !apartmentNumber){
		alert(numberFormatMassege);
		document.getElementById('entrance').classList.add(`userError`);
		document.getElementById('flats').classList.add(`userError`);
		document.getElementById('numberOfFloors').classList.add(`userError`);
		return;
	}
	let numberOfFlats = entrance * flats * numberOfFloors;
	if (apartmentNumber > numberOfFlats || apartmentNumber <= 0){
		alert("такой квартиры не существует");
		return;
	}
	let countUnder = 1;
	let countFlors = 1;
	const flightOfStairs =  numberOfFloors * flats; //лестничный пролет
	for (let i = 1; i < apartmentNumber; i++){
		if(i % flats === 0){
			countFlors++;
		}
		if(i % flightOfStairs === 0){ 
			countUnder++;
			countFlors -= numberOfFloors;
		}
	}
	let result = "";
	result = 'подьезд № ' + countUnder + ' этаж № ' + countFlors;
	document.getElementById('nine_task_results').innerText = result;

	document.getElementById('entrance').classList.add(`standardСolor`);
	document.getElementById('flats').classList.add(`standardСolor`);
	document.getElementById('numberOfFloors').classList.add(`standardСolor`);
	document.getElementById('nine_task_results').classList.add(`userEnteredCorrectly`);
}

function tenTask(){ 
	let firstNumber = +document.getElementById('tenTaskGetNumber').value;
	if(!firstNumber){
		alert(numberFormatMassege);
		document.getElementById('tenTaskGetNumber').classList.add(`userError`);
		return;
	}
	let arr = firstNumber.toString().replace(/-/g, "").split('');
	let check = parseInt(firstNumber);
	
	let result = arr.reduce(function(acc, item){
		return acc + item * 1;
	}, 0);
	document.getElementById(`ten_result`).innerText = result;
	document.getElementById(`tenTaskGetNumber`).classList.add(`standardСolor`);
}

function eelevenTask(){// не сортирует 
	let clear = document.getElementById('elevenTaskTextarea').value + "";
	clear.innerText = "";
	let a = document.getElementById('elevenTaskTextarea').value + "";
	let check = a.replace(/https?\:\/\//gi,'');
	let arr = check.split(',')
	.split(' ')
	.sort();
	document.getElementById('elevenTaskTextareaRezult').innerText = arr;
}

function test(){
	let arr = ["https://facebook.com","https://facebook.com","1","https://google.com","https://google.com"];
	let ress = arr.reduce(function(acc, item){
		return acc + item;
	}, 0);
	alert(ress);
}

function elevenTask(){// не сортирует 
	let clear = document.getElementById('elevenTaskTextarea');
	clear.innerText = "";
	let a = document.getElementById('elevenTaskTextarea');

	let link = a.value
	.split(/[\s,]/)
	.filter(link => link)
	.map(link => link.replace(/https?\:\/\//gi,''))
	.sort()
	.reduce((ul, link) => 
		ul = `<li><a href="//${link}">${link}</a></li>`, '');

	document.getElementById('elevenTaskTextareaRezult').innerText = link;
	let test = document.getElementById("link-item-ul");

	//test.innerHtml = link;
	test.appendChild(link);
}