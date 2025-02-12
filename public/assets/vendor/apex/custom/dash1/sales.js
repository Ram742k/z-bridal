			
console.log(invoiceData.weeklySales);
//only number without ket object 
var weeklySales = Object.values(invoiceData.weeklySales);
console.log(weeklySales);
var options = {
	chart: {
		height: 230,
		type: "area",
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
		width: 1,
	},
	series: [
		{
			name: "Sales",
			//pass weeklySales array
			data: weeklySales,
		},
	],
	grid: {
		borderColor: "#dae1ea",
		strokeDashArray: 5,
		xaxis: {
			lines: {
				show: true,
			},
		},
		yaxis: {
			lines: {
				show: false,
			},
		},
		padding: {
			top: 0,
			right: 0,
			bottom: 10,
			left: 0,
		},
	},
	xaxis: {
		type: "day",
		categories: [ "Mon", "Tue", "Wed", "Thu", "Fri", "Sat","Sun"],
	},
	yaxis: {
		labels: {
			show: false,
		},
	},
	colors: ["#0073d8", "#df1438"],
	fill: {
		type: "gradient",
		gradient: {
			shadeIntensity: 1,
			opacityFrom: 0.4,
			opacityTo: 0.2,
			stops: [0, 90, 100],
		},
	},
};

var chart = new ApexCharts(document.querySelector("#sales"), options);

chart.render();
