/*$(function() {
	$("#status3").sparkline([9, 6, 7, 5, 9, 5, 9, 7, 5, 6, 3, 7, 7, 6, 7, 8, 8, 5], {
	type: 'line',
	width: '80',
	height: '20',
	lineColor: '#0ca5e7',
	fillColor: '#e5f3f9'});

	var d1 = [];
	for (var i = 0; i <= 30; i += 1)
		d1.push([i, parseInt(Math.random() * 30)]);

	var d2 = [];
	for (var i = 0; i <= 30; i += 1)
		d2.push([i, parseInt(Math.random() * 30)]);


	var stack = 0, bars = true, lines = false, steps = false;

	function plotWithOptions() {
		$.plot($("#bar-chart"), [d1, d2], {
			series: {
				stack: stack,
				lines: {show: lines, fill: true, steps: steps},
				bars: {show: bars, barWidth: 0.8}
			},
			grid: {
				borderWidth: 0, hoverable: true, color: "#777"
			},
			colors: ["#52b9e9", "#0aa4eb"],
			bars: {
				show: true,
				lineWidth: 0,
				fill: true,
				fillColor: {colors: [{opacity: 0.9}, {opacity: 0.8}]}
			}
		});
	}

	plotWithOptions();

	$(".stackControls input").click(function(e) {
		e.preventDefault();
		stack = $(this).val() === "With stacking" ? true : null;
		plotWithOptions();
	});
	$(".graphControls input").click(function(e) {
		e.preventDefault();
		bars = $(this).val().indexOf("Bars") !== -1;
		lines = $(this).val().indexOf("Lines") !== -1;
		steps = $(this).val().indexOf("steps") !== -1;
		plotWithOptions();
	});
});*/

$(function() {
            function addZero(num) {
                return ((num + "").length < 2 ? "0" : "") + num;
            }

            function dateFormat(indate) {
                var hh = addZero(indate.getHours());
                var MM = addZero(indate.getMinutes());
                //var dd = addZero(indate.getDate());
                //var mm = addZero(indate.getMonth() + 1);
                return hh + ':' + MM;
            }

            g1 = new Dygraph(
                    document.getElementById("graphdiv1"),
                    "../temp/temp.log",
                    {
                        xValueParser: function(x) {
                            var date = new Date(x.replace(/^(\d{4})(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/,'$4:$5:$6 $2/$3/$1'));
                            return date.getTime();
                        },
						colors:["#43c83c","#0ca5e7","#fa3031"],
						yAxisLabelWidth:30,
                        axes: {
                            x: {
                                ticker: Dygraph.dateTicker,
                                axisLabelFormatter: function(x) {
                                    return dateFormat(new Date(x));
                                },
                                valueFormatter: function(x) {
                                    return dateFormat(new Date(x));
                                }
                            }
                        },
                        labelsDivWidth: 450,
                        rollPeriod: 30,
                        strokeWidth: 2.0,
                        labels: ['Date', 'Humidity (%)', 'Temp (&deg;C)']
        }
	);

});


/* Curve chart starts */

/*$(function() {
	var sin = [], cos = [];
	for (var i = 0; i < 14; i += 0.5) {
		sin.push([i, Math.sin(i)]);
		cos.push([i, Math.cos(i)]);
	}

	var plot = $.plot($("#curve-chart"),
			[{data: sin, label: "sin(x)"}, {data: cos, label: "cos(x)"}], {
		series: {
			lines: {show: true,
				fill: true,
				fillColor: {
					colors: [{
							opacity: 0.05
						}, {
							opacity: 0.01
						}]
				}
			},
			points: {show: true}
		},
		grid: {hoverable: true, clickable: true, borderWidth: 0},
		yaxis: {min: -1.2, max: 1.2},
		colors: ["#fa3031", "#43c83c"]
	});


	function showTooltip(x, y, contents) {
		$('<div id="tooltip">' + contents + '</div>').css({
			position: 'absolute',
			display: 'none',
			top: y + 5,
			width: 100,
			left: x + 5,
			border: '1px solid #000',
			padding: '2px 8px',
			color: '#ccc',
			'background-color': '#000',
			opacity: 0.9
		}).appendTo("body").fadeIn(200);
	}

	var previousPoint = null;
	$("#curve-chart").bind("plothover", function(event, pos, item) {
		$("#x").text(pos.x.toFixed(2));
		$("#y").text(pos.y.toFixed(2));

		if (item) {
			if (previousPoint !== item.dataIndex) {
				previousPoint = item.dataIndex;

				$("#tooltip").remove();
				var x = item.datapoint[0].toFixed(2),
						y = item.datapoint[1].toFixed(2);

				showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
			}
		}
		else {
			$("#tooltip").remove();
			previousPoint = null;
		}
	});

	$("#curve-chart").bind("plotclick", function(event, pos, item) {
		if (item) {
			$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
			plot.highlight(item.series, item.datapoint);
		}
	});
});*/
