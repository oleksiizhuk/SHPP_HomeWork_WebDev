$(function () {
  getDataWithJson();
});

function getDataWithJson() {
	$.ajax ({
		url: 'handler.php',
		type: "POST",
		data: 'getJson=',
		success(ressponce) {
			console.log(ressponce);
			jsonToGoogleCharts(ressponce);
		}
	});
}

function jsonToGoogleCharts(arr) {
	arr = $.parseJSON(arr);
	
	google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				const data = google.visualization.arrayToDataTable([
					['Salary', 'Amount'],
					['BMW',     arr.BMW],
					['Audi',      arr.Audi],
					['GMC',  arr.GMC],
					['Zhiguli', arr.Zhiguli],
				]);

				const options = {
					title: 'Марка автомобиля',
					pieHole: 0.4,
				};

				const chart = new google.visualization.PieChart(document.getElementById('donutchart'));
				chart.draw(data, options);
			}
}
