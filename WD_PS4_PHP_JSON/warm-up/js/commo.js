function test (){
	ajaxGet();
}

function ajaxGet(){
	$.ajax ({
			url: "ajax.php",
			type: "POST",
			dataType: "json",
			data: {
				getResult: "",
			},
			success(ressponce) {
				jsonToGoogleCharts(ressponce);
			}
		});
		console.log('ajaxGet - отработал');

}