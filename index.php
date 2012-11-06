<?php
	$ticker = $_GET['ticker'];
	if (!$ticker) $ticker = 'AAPL';
	include './include/header.php';
?>
<script type="text/javascript">
$(function() {
	<?php echo"$.getJSON('http://localhost/csci6441_stocks/get_data.php?ticker=$ticker', function(data) {
		// split the data set into ohlc and volume
		var ohlc = [],
			volume = [],
			dataLength = data.length;
			
		for (i = 0; i < dataLength; i++) {
			ohlc.push([
				data[i][0], // the date
				data[i][1], // open
				data[i][2], // high
				data[i][3], // low
				data[i][4] // close
			]);
			
			volume.push([
				data[i][0], // the date
				data[i][5] // the volume
			])
		}

		// set the allowed units for data grouping
		var groupingUnits = [[
			'week',                         // unit name
			[1]                             // allowed multiples
		], [
			'month',
			[1, 2, 3, 4, 6]
		]];

		// create the chart
		chart = new Highcharts.StockChart({
		    chart: {
		        renderTo: 'chart',
		        alignTicks: false
		    },

		    rangeSelector: {
		        selected: 5
		    },

		    title: {
		        text: '$ticker Historical'
		    },

		    yAxis: [{
		        title: {
		            text: 'OHLC'
		        },
		        height: 200,
		        lineWidth: 2
		    }, {
		        title: {
		            text: 'Volume'
		        },
		        top: 300,
		        height: 100,
		        offset: 0,
		        lineWidth: 2
		    }],
		    
		    series: [{
		        type: 'candlestick',
		        name: '$ticker',
		        data: ohlc,
		        dataGrouping: {
					units: groupingUnits
		        }
		    }, {
		        type: 'column',
		        name: 'Volume',
		        data: volume,
		        yAxis: 1,
		        dataGrouping: {
					units: groupingUnits
		        }
		    }]
		});
		
		// // Create the chart
		// window.chart = new Highcharts.StockChart({
			// chart : {
				// renderTo : 'chart'
			// },
// 			
			// rangeSelector : {
				// buttons : [{
					// type : 'year',
					// count : 1,
					// text : '1Y'
				// }, {
					// type : 'year',
					// count : 3,
					// text : '3Y'
				// }, {
					// type : 'all',
					// count : 1,
					// text : 'All'
				// }],
				// selected : 1,
				// inputEnabled : false
			// },
// 
			// title : {
				// text : '$ticker Stock Price'
			// },
// 			
			// series : [{
				// name : '$ticker',
				// data : data,
				// tooltip: {
					// valueDecimals: 2
				// }
			// }]
		// });
	});"?>
});
</script>
<script src="highstock/js/highstock.js"></script>
<script src="highstock/js/modules/exporting.js"></script>
<div id="left-bar">
	<ul id="ticker-list">
		<li>Ticker List: </li>
		<li><a href="?ticker=AAPL">Apple</a></li>
		<li><a href="?ticker=AMD">AMD</a></li>
		<li><a href="?ticker=AMZN">Amazon</a></li>
		<li><a href="?ticker=AOL">AOL</a></li>
		<li><a href="?ticker=BIDU">Baidu</a></li>
		<li><a href="?ticker=EMC">EMC</a></li>
		<li><a href="?ticker=FB">Facebook</a></li>
		<li><a href="?ticker=GOOG">Google</a></li>
		<li><a href="?ticker=IBM">IBM</a></li>
		<li><a href="?ticker=INTC">Intel</a></li>
	</ul>
</div>
<div id="container">
	<div id="chart"></div>
</div>
<?php include './include/footer.php'; ?>