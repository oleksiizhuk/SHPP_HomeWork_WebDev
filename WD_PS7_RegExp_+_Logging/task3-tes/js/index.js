var l = console.log;
var t = alert;
l(42);
l(45);
let count = 0;
for (let i = 1; i < 999999; i++) {
    let sum = i;
    const newNumber = i.toString().padStart(6, '0');
    const fN = newNumber[0] + newNumber[1] + newNumber[2];
    const sN = newNumber[3] + newNumber[4] + newNumber[5];
    if (fN === sN){
        count++;
    }
}
console.log(count);

/*$(function () {

});*/

const logger = {

    test: function (obj) {

    },

    test1: function () {

    }

}