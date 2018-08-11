$(function () {
  ajaxGet();
});

function ajaxGet() {
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
function jsonToGoogleCharts(jsonArray) {
	console.log("jsonArray - " + jsonArray);
	google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				const data = google.visualization.arrayToDataTable([
					['Salary', 'Amount'],
					['1000$',     jsonArray.option1],
					['2000$',      jsonArray.option2],
					['3000$',  jsonArray.option3],
					['4000$', jsonArray.option4],
				]);

				const options = {
					title: 'Зарплаты',
					pieHole: 0.4,
				};

				const chart = new google.visualization.PieChart(document.getElementById('donutchart'));
				chart.draw(data, options);
			}
}
