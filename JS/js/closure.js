console.log("------------------НУЛЕВОЙ ПРИМЕР -----------");

function outer1() {
    let counter = 0;

    function incrementCounter() {
        return counter++;
    }

    return incrementCounter;
}

const Zero_Test = outer1();
console.log(Zero_Test());
console.log(Zero_Test());
console.log(Zero_Test());
console.log(outer1());
console.log(outer1());
console.log(outer1());

console.log("------------------ПЕРВЫЙ ПРИМЕР -----------");

function outer() {
    let counter = 0;

    function incrementCounter() {
        return counter++;
    }

    return incrementCounter;
}

const count = outer();
console.log(count());
console.log(count());
console.log(count());
console.log(outer());
console.log(outer());
console.log(outer());

// второй пример
console.log("------------------ВТОРОЙ ПРИМЕР -----------");


var currentCount = 1;

function makeCounter() {
    return function () {
        return currentCount++;
    };
}

let counter = makeCounter();
let counter2 = makeCounter();

console.log(counter());
console.log(counter());
console.log(counter2());
console.log(counter2());

console.log("------------------ТРЕТИЙ ПРИМЕР -----------");

function makeCounter2() {
    var currCo = 1;
    return function () {
        return currCo++;
    };
}

let count1 = makeCounter2();
let count2 = makeCounter2();

console.log(count1());
console.log(count1());
console.log(count2());
console.log(count2());

console.log("------------------ЧЕТВЕРТЫЙ ПРИМЕР -----------");