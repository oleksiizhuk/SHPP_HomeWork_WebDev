$(function () {

    const integer = [2, 2, 3, 4, 5, 6];
    const char = ["a", "bb", "ccc"];
    const string = ["how", "are", "you!"];
    const objInt = [{a: 1, b: 2}, {a: 3, b: 4}];
    const objStr = [{a: "a", b: "bb"}, {a: "aaa", b: "bbbb"}];


    let sum = integer.reduce((accumulator, currentValue) => {
        return accumulator + currentValue;
    }, 1);
    console.log(sum);

    const vals = integer.filter(x => x % 2 == 0);
    console.log(vals);

    const valsMap = integer.map(x => x * 2)
        .filter(x => x % 3 == 0)
    console.log(valsMap);

    const result = string.map(x => x.length);
    console.log(result);

    let liElement = string.map(x => `<li>${x}`);
    let liElement1 = string.map(x => `<li>${x}`)
        .reduce((previousValue, currentValue) => {
            return previousValue + currentValue.length;
        }, 1);

    let liElement2 = string.map(x => `<li>${x}`)
        .reduce((previousValue, currentValue) => {
            return previousValue + currentValue.length;
        }, 1);


    console.log(liElement);
    console.log("liElement1 - " + liElement1);

    $(".ul").append(liElement);

    function aaa() {
        var a = 1;
    }

    console.log(a);
});