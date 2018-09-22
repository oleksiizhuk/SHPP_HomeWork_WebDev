$(function () {
  ajaxGet();
});

function ajaxGet() {
	$.ajax ({
		url: 'ajax.php',
		type: "POST",
		data: 'getJson=',
		success(ressponce) {
			jsonToGoogleCharts(ressponce);
		}
	});
}

function jsonToGoogleCharts(arr) {
	arr =  $.parseJSON( arr );
	
	google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				const data = google.visualization.arrayToDataTable([
					['Salary', 'Amount'],
					['BMW',     arr[0].BMW],
					['Audi',      arr[0].Audi],
					['GMC',  arr[0].GMC],
					['Zhiguli', arr[0].Zhiguli],
				]);

				const options = {
					title: 'Марка автомобиля',
					pieHole: 0.4,
				};

				const chart = new google.visualization.PieChart(document.getElementById('donutchart'));
				chart.draw(data, options);
			}
}
