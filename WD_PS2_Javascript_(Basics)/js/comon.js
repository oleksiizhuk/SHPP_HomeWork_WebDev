var redColor = "#e84118";
var standardColor = "#c2b6b6";
var greenColor = "#4cd137";
var numberFormatMassege = "Вводите в строку только числа";
function firstTask() { 
	let firstNumber = +document.getElementById("ft_firstNumber").value;
	let secondNumber = +document.getElementById("ft_secondNumber").value;
	if (!firstNumber && firstNumber != 0   || !secondNumber && secondNumber != 0 ){
		document.getElementById("ft_result").innerText = numberFormatMassege;
		document.getElementById("ft_firstNumber").classList.add("userError");
		document.getElementById("ft_secondNumber").classList.add("userError");
		document.getElementById("ft_result").classList.add("standardСolor");
		return;
	}
	if (firstNumber > secondNumber){
		[secondNumber, firstNumber] = [firstNumber, secondNumber];
	}
	let result = 0;
	for (let i = firstNumber; i <= secondNumber; i++){
		result += i;
	}
	document.getElementById("ft_firstNumber").classList.add("standardСolor");
	document.getElementById("ft_secondNumber").classList.add("standardСolor");
	document.getElementById("ft_result").classList.add("userEnteredCorrectly");
	document.getElementById("ft_result").innerText = result;
}

function secondTask() {
	let firstNumber = +document.getElementById('st_firstNumber').value;
	let secondNumber = +document.getElementById('st_secondNumber').value;
	if(!firstNumber && firstNumber != 0   || !secondNumber && secondNumber != 0 ){
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
		let check = removeMinus % 10;
		if(check === 2 || check === 3 || check === 7){
			result += i;
		}
	}
	document.getElementById('st_firstNumber').classList.add('standardСolor');
	document.getElementById('st_secondNumber').classList.add('standardСolor');
	document.getElementById('st_result').classList.add('userEnteredCorrectly');
	document.getElementById('st_result').innerText = result;
}

function thirdTask(){
	let container = document.getElementById("thirdTaskList");
	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}

	let firstNumber = +document.getElementById("tt_firstNumber").value;
	if (!firstNumber && firstNumber != 0){
		alert(numberFormatMassege);
		document.getElementById("tt_firstNumber").classList.add("userError");
		return;
	}
	if (firstNumber > 300 || firstNumber <= 0){
		alert("введите число меньше от 1 до 300!!!");
		document.getElementById('tt_firstNumber').classList.add('userError');
		return;
	}
	let ul = document.createElement("ul");
	document.getElementById("thirdTaskList").appendChild(ul);
	let star = "";
	for (let i = 1; i <= firstNumber; i++){
		let li = document.createElement("li"); 
		id  = "myLi" + i;
		li.setAttribute('id', id);
		ul.appendChild(li);
		for (let k = i - 1; k < i; k++){
			star += "*" 
		}	
		document.getElementById('myLi' + i).innerText = star; 
	}
	document.getElementById("tt_firstNumber").classList.add("userEnteredCorrectly");
}

function fourthTask(){
	let firstNumber = +document.getElementById('getUserSeconds').value;
	if (firstNumber <= 0 || !firstNumber){
		document.getElementById("fourTaskResult").innerText = numberFormatMassege;
		document.getElementById('getUserSeconds').classList.add("userError");
		return;
	}
	let hour = 0, minutes = 0,result;
	const secondPerHour = 3600;
	if (firstNumber >= secondPerHour){
		hour = firstNumber / secondPerHour;
		hour =  Math.trunc(hour);
		firstNumber = firstNumber - (secondPerHour * hour);
	}
	const secondPerMinutes = 60;
	if (firstNumber >= secondPerMinutes){
		minutes = firstNumber / secondPerMinutes
		minutes =  Math.trunc(minutes);
		firstNumber = firstNumber - (secondPerMinutes * minutes);
	}
		result = hour.toString().padStart(2, '0')  + ':' + minutes.toString().padStart(2, '0') + ':' + firstNumber.toString().padStart(2, '0');
		document.getElementById('timeResult').value = result;
		document.getElementById('getUserSeconds').classList.add("userEnteredCorrectly");
}

function fifthTask(){ 
	const year = +document.getElementById("fifth_task_year").value;
	if (year != 0 && !year){
		alert(numberFormatMassege);
		document.getElementById('fifth_task_year').classList.add("userError");
		return;
	}
	const removeUnnecessary = year % 100;
	const number = removeUnnecessary.toString();
	const numberLenght = number.length;
	let result = "";
	if (year === 0){
		result = `${year} лет`;
		document.getElementById(`fiftT_result`).value = result;
		return;
	}
	if (number[numberLenght - 1] == 1){
		if (number[numberLenght - 2] == 1){
			result = `${year} лет`;
			document.getElementById('fiftT_result').value = result;
			return;
		}else{
			result = `${year} год`;
			document.getElementById('fiftT_result').value = result;
			return;
		}
	}
	if (number[numberLenght - 1] == 2 || number[numberLenght -1] == 3 || number[numberLenght -1] == 4){
		if (removeUnnecessary >= 11 && removeUnnecessary < 20){
			result = `${year} лет`;
			document.getElementById('fiftT_result').value = result;
			return;
		} else {
			result = `${year} года`;
			document.getElementById('fiftT_result').value = result;
			return;
		}
	} else {
		result = `${year} лет`;
		document.getElementById('fiftT_result').value = result;
		return;
	}
	if (number[numberLenght - 1] == 0){
		result = `${year} лет`;;
		document.getElementById('fiftT_result').value = result;
	}
}

function sixthTask(){ 
	let date1 = new Date(document.getElementById('sixTaskFirstNumber').value);
	let date2 = new Date(document.getElementById('sixTaskSecondNumber').value);
	if (date1 === "Invalid Date" || date2 === "Invalid Date"){
		document.getElementById("sixTaskResultP").innerText = "Ooops... Invalid Date";
		return;
	}
	if (date2 > date1){
		[date1, date2] = [date2, date1];
	}
    let year = date1.getYear() - date2.getYear();
    let month = date1.getMonth() - date2.getMonth();
    let date = date1.getDate() - date2.getDate();
    let hours = date1.getHours() - date2.getHours();
    let minutes = date1.getMinutes() - date2.getMinutes();
    let seconds = date1.getSeconds() - date2.getSeconds();
	
	if (seconds < 0){
		minutes = minutes - 1;
		seconds = 60 + seconds; 
	}
	if (minutes < 0){
		hours = hours - 1;
		minutes = 60 + minutes; 
	}
	if (hours < 0){
		date = date - 1;
		hours = 24 + hours; 
	}
	if (date < 0){
		month = month - 1;
		date = new Date(date1.getYear(), date1.getMonth() + 1, 0).getDate() + date; 
	}
	if (month < 0){
		year = year - 1;
		month = 12 + month; 
	}
	let result = ` ${year} года, ${month} месяц ${date} дней ${hours} часов, ${minutes} минут ${seconds} секунд`;
	document.getElementById("sixTaskResultP").innerText = result;
}

function sixTaskVersion2(){
	let firstNumber = document.getElementById('sixTaskFirstNumber2').value;
	let secondNumber = document.getElementById('sixTaskSecondNumber2').value;
    let date1 = Date.parse(firstNumber);
    let date2 = Date.parse(secondNumber);
	if (date1 === "Invalid Date" || date2 === "Invalid Date"){
		document.getElementById("sixTaskResultP2").innerText = "Ooops... Invalid Date";
		return;
	}
	if (date2 > date1){
		[date1, date2] = [date2, date1];
		[firstNumber, secondNumber] = [secondNumber, firstNumber];
	}
	let z = new Date(date1 - date2);
	let epoch = new Date("1970-01-01 00:00:00");
	let yearRessult = z.getYear() - epoch.getYear();
	let monthRessult = z.getMonth() - epoch.getMonth();
	let daysRessult = z.getDate() - epoch.getDate();
	// ********************************** //
		let d1 = new Date();
		let timeSecond = d1.setTime(Date.parse(firstNumber));
		let d2 = new Date();
		let timeFirst = d2.setTime(Date.parse(secondNumber));

		let differenceBetweenTwoDate = Math.abs(timeSecond - timeFirst);
		const MILESECONDS_IN_YEAR = 31536000000;
		const MILESECONDS_IN_MOUTH = 2592000000;
		const MILESECONDS_IN_DAY = 86400000;
		const MILESECONDS_IN_HOUR = 3600000;
		const MILESECONDS_IN_MINUTES = 60000;
		const MILESECONDS = 1000;
		let hourRessult = Math.floor((((differenceBetweenTwoDate % MILESECONDS_IN_YEAR) % MILESECONDS_IN_MOUTH) % MILESECONDS_IN_DAY) / MILESECONDS_IN_HOUR);
		let minutesRussult = Math.floor(((((differenceBetweenTwoDate % MILESECONDS_IN_YEAR) % MILESECONDS_IN_MOUTH) % MILESECONDS_IN_DAY) % MILESECONDS_IN_HOUR) / MILESECONDS_IN_MINUTES);
		let secondsRessult = Math.floor((((((differenceBetweenTwoDate % MILESECONDS_IN_YEAR) % MILESECONDS_IN_MOUTH) % MILESECONDS_IN_DAY) % MILESECONDS_IN_HOUR) % MILESECONDS_IN_MINUTES) / MILESECONDS);
		// ***************************************** //
	 let result = `${yearRessult} года, ${monthRessult} месяц, ${daysRessult} дней, ${hourRessult} часов, ${minutesRussult} минут, ${secondsRessult} секунд `;
	document.getElementById("sixTaskResultP2").innerText = result;
}

function sevenTask(){
	const date = document.getElementById("seven_task_data").value + "";
	const zodiacSign = "zodiacSign";
	const checker = checkDateSevenTask(date);
	if (checker === "err"){
		document.getElementById(zodiacSign).src = "#";
		return;
	}
	const d = new Date(date);
	const day = d.getDate();
	const m = new Date(date);
	const mounths = m.getMonth() + 1;
	if (m === "Invalid Date"){
		alert("Ooops... Invalid Date");
		return;
	}
	if (mounths === 1 && day >= 20 || mounths === 2 && day <= 18){  
		document.getElementById(zodiacSign).src="img/водолей.png";
	}
	else if (mounths === 2 && day >= 19 || mounths === 3 && day <= 20){
		document.getElementById(zodiacSign).src="img/рыбы.png";
	} 
	else if (mounths === 3 && day >= 21 || mounths === 4 && day <= 19){
		document.getElementById(zodiacSign).src="img/Оввен.png";
	} 
	else if (mounths === 4 && day >= 20 || mounths === 5 && day <= 20){
		document.getElementById(zodiacSign).src="img/телец.png";
	}
	else if (mounths === 5 && day >= 21 || mounths === 6 && day <= 21){
		document.getElementById(zodiacSign).src="img/близнецы.png";
	}
	else if (mounths === 6 && day >= 22 || mounths === 7 && day <= 22){
		document.getElementById(zodiacSign).src="img/рак.png";
	}
	else if (mounths === 7 && day >= 23 || mounths === 8 && day <= 22){
		document.getElementById(zodiacSign).src="img/Лев.png";
	}
	else if (mounths === 8 && day >= 23 || mounths === 9 && day <= 22){
		document.getElementById(zodiacSign).src="img/дева.png";
	}
	else if (mounths === 9 && day >= 23 || mounths === 10 && day <= 22){
		document.getElementById(zodiacSign).src="img/весы.png";
	}
	else if (mounths === 10 && day >= 23 || mounths === 11 && day <= 21){
		document.getElementById(zodiacSign).src="img/скорпион.png";
	}
	else if (mounths === 11 && day >= 22 || mounths === 12 && day <= 21){
		document.getElementById(zodiacSign).src="img/стрелец.png";
	}
	else if (mounths === 12 && day >= 22 || mounths === 1 && day <= 19){
		document.getElementById(zodiacSign).src="img/козерог.png";
	} 
	document.getElementById('resultErorrSevenTask').innerText = "";
}

function checkDateSevenTask(date){
	let dateAndMounths = date.split('-');
	let arr = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	if (arr[dateAndMounths[1] - 1] < dateAndMounths[2]){
		document.getElementById('resultErorrSevenTask').innerText = `в этом месяце максимальное количество дней ${arr[dateAndMounths[1] - 1]}`;
		return "err";
	}
	return 0;
}

function eightTast(){
	const getValuefirst = +document.getElementById('eightTaskGetValue').value;
	const getValueSecond = +document.getElementById('eightTaskGetSecondValue').value;
	if (getValuefirst > 50 || getValuefirst <= 0 || getValueSecond > 50 || getValueSecond <= 0 || !getValuefirst || !getValueSecond){
		document.getElementById('eightTaskMessege').innerText = "числа от 1 до 50!!!";
		document.getElementById('eightTaskGetValue').classList.add("userError");
		document.getElementById('eightTaskGetSecondValue').classList.add("userError");
		return;
	}
	const container = document.getElementById('eight_task_div');
	while (container.firstChild) {
		container.removeChild(container.firstChild);
	}
	let getDiv = document.getElementById("eight_task_div");
	for (let i = 1; i <= getValuefirst; i++){		
		let ul = document.createElement("ul");
		getDiv.appendChild(ul);
		let attrUl = 'E_Ul' + i;
		ul.setAttribute('id', attrUl);
		let getAttr = document.getElementById(attrUl);
		for(let k = 1; k <= getValueSecond; k++){
			let li = document.createElement("li");
			let attr  = "last_li";
			li.setAttribute('class', attr);
			getAttr.appendChild(li);
		}	
	}
	document.getElementById('eightTaskMessege').innerText = "";
}

function nineTask(){
	let entrance = +document.getElementById("entrance").value;
	let flats = +document.getElementById("flats").value;
	let numberOfFloors = +document.getElementById("numberOfFloors").value;
	let apartmentNumber = +document.getElementById("apartmentNumber").value;
	
	if (!entrance || !flats || !numberOfFloors || !apartmentNumber){
		alert(numberFormatMassege);
		document.getElementById('entrance').classList.add("userError");
		document.getElementById('flats').classList.add("userError");
		document.getElementById('numberOfFloors').classList.add("userError");
		return;
	}
	let numberOfFlats = entrance * flats * numberOfFloors;
	if (apartmentNumber > numberOfFlats || apartmentNumber <= 0){
		alert("такой квартиры не существует");
		return;
	}
	let countUnder = 1;
	let countFlors = 1;
	const flightOfStairs =  numberOfFloors * flats;
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
	result = `подьезд № ${countUnder} этаж № ${countFlors}`;
	document.getElementById('nine_task_results').innerText = result;

	document.getElementById('entrance').classList.add("standardСolor");
	document.getElementById('flats').classList.add("standardСolor");
	document.getElementById('numberOfFloors').classList.add("standardСolor");
	document.getElementById('nine_task_results').classList.add("userEnteredCorrectly");
}

function tenTask(){  //.join("-")
	let firstNumber = document.getElementById('tenTaskGetNumber').value;
	if (firstNumber.replace (/\d/g, '')){
		document.getElementById("ten_result").innerText = 'вы ввели не только цифры';
		return;
	} 

	if (!firstNumber){
		alert(numberFormatMassege);
		document.getElementById('tenTaskGetNumber').classList.add("userError");
		return;
	}
	let arr = firstNumber.toString().replace(/-/g, "").split('');
	let check = parseInt(firstNumber);
	
	let result = arr.reduce(function(acc, item){
		return acc + item * 1;
	}, 0);
	document.getElementById("ten_result").innerText = result;
	document.getElementById("tenTaskGetNumber").classList.add("standardСolor");
}

function elevenTask(){
	let clear = document.getElementById('elevenTaskTextarea');
	clear.innerText = "";
	let a = document.getElementById('elevenTaskTextarea');
	let ul = document.getElementById("link-item-ul");
	let link = a.value
	.split(/[\s,]/)
	.filter(link => link)
	.map(link => link.replace(/https?\:\/\//gi,''))
	.sort()
	.reduce(function(acc, link){ 
		let li = document.createElement("li");
		let a = document.createElement("a");
		a.href = `//${link}`;
		a.innerText = link;
		li.appendChild(a);
		return ul.appendChild(li);
	});
}

