$(function() {
	//colors: ["#fa3031", "#43c83c", "#ff2424"]
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
			colors:["#43c83c","#0ca5e7"],
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

	g2 = new Dygraph(
		document.getElementById("graphdiv2"),
		"../temp/cpu.log",
		{
			xValueParser: function(x) {
				var date = new Date(x.replace(/^(\d{4})(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/,'$4:$5:$6 $2/$3/$1'));
				return date.getTime();
			},
			colors:["#fa3031"],
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
			labelsDivWidth: 500,
			rollPeriod: 30,
			strokeWidth: 2.0,
			labels: ['Date', 'CPU Temp (&deg;C)']
		}
	);

	g2 = new Dygraph(
        document.getElementById("graphdiv3"),
        "../temp/cpufreq.log",
        {
            xValueParser: function(x) {
                var date = new Date(x.replace(/^(\d{4})(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/,'$4:$5:$6 $2/$3/$1'));
                return date.getTime();
            },
            colors:["#f88529"],
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
            labelsDivWidth: 500,
            rollPeriod: 30,
            strokeWidth: 2.0,
            labels: ['Date', 'CPU Frequency (Mhz)']
        }
    );

});
