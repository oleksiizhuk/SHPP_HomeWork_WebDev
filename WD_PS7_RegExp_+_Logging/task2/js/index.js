$(function () {

    $('body').keydown(function () {
        let text = $(".textarea").val();
        let regexp = $(".input-pattern").val();
        const parts = /\/(.*)\/(.*)/.exec(regexp);
        console.log(parts);
        const $outPut = $(".output");
        if (parts === null) {
            $outPut.empty();
            $outPut.append("valid regular err");
            return;
        }
        let regular = new RegExp(parts[1], parts[2]);

        function replacer(match) {
            return `<mark>${match}</mark>`;
        }

        let result = text.replace(regular, replacer);
        $outPut.empty();
        $outPut.append(result);

    });

    function foo() {

    }

    function bar() {

    }
});