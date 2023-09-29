(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var lineChart = function(){
		var options = {
          series: [{
          name: 'Income',
          data: [420, 550, 850, 220, 650]
        }, {
          name: 'Expenses',
          data: [170, 850, 101, 90, 250]
        }],
          chart: {
          type: 'bar',
          height: 350,
		  toolbar: {
            show: false
          }
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
		
		legend: {
			show: true,
			fontSize: '12px',
			fontWeight: 300,
			
			labels: {
				colors: 'black',
			},
			position: 'bottom',
			horizontalAlign: 'center', 	
			markers: {
				width: 19,
				height: 19,
				strokeWidth: 0,
				radius: 19,
				strokeColor: '#fff',
				fillColors: ['#80ec67','#fe7d65'],
				offsetX: 0,
				offsetY: 0
			}
		},
		yaxis: {
			labels: {
		   style: {
			  colors: '#3e4954',
			  fontSize: '14px',
			   fontFamily: 'Poppins',
			  fontWeight: 100,
			  
			},
		  },
		},
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['06', '07', '08', '09', '10'],
        },
        fill: {
		  colors:['#80ec67','#fe7d65'],
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#line-chart"), options);
        chart.render();
	}
	var chartBar = function(){
		var optionsArea = {
          series: [{
            name: "Recovered Payment",
            data: [500, 230, 600, 360, 700, 890, 750, 420, 600, 300, 420, 220]
          },
          {
            name: "New Payment",
            data: [250, 380, 200, 300, 200, 520,380, 770, 250, 520, 300, 900]
          }
        ],
          chart: {
          height: 350,
          type: 'area',
		  group: 'social',
		  toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [2, 2],
		  colors:['#F46B68','var(--primary)'],
		  curve: 'straight'
        },
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          },
		  markers: {
			fillColors:['#F46B68','var(--primary)'],
			width: 19,
			height: 19,
			strokeWidth: 0,
			radius: 19
		  }
        },
        markers: {
          size: 6,
		  border:0,
		  colors:['#F46B68','var(--primary)'],
          hover: {
            size: 6,
          }
        },
        xaxis: {
          categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September','October','November','December',
            '10 Jan', '11 Jan', '12 Jan'
          ],
        },
		yaxis: {
			labels: {
		   style: {
			  colors: '#3e4954',
			  fontSize: '14px',
			   fontFamily: 'Poppins',
			  fontWeight: 100,
			  
			},
		  },
		},
		fill: {
			colors:['#F46B68','var(--rgba-primary-1)'],
			type:'solid',
			opacity: 0.07
		},
        grid: {
          borderColor: '#f1f1f1',
        }
        };
		var chartArea = new ApexCharts(document.querySelector("#chartBar"), optionsArea);
        chartArea.render();

	}	
	var chartBar1 = function(){
		var optionsArea = {
          series: [{
            name: "Recovered Payment",
            data: [500, 230, 600, 360, 700, 890, 750, 420, 600, 300, 420, 220]
          },
          {
            name: "New Payment",
            data: [250, 380, 200, 300, 200, 520,380, 770, 250, 520, 300, 900]
          }
        ],
          chart: {
          height: 350,
          type: 'area',
		  group: 'social',
		  toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [2, 2],
		  colors:['#F46B68','var(--primary)'],
		  curve: 'straight'
        },
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          },
		  markers: {
			fillColors:['#F46B68','var(--primary)'],
			width: 19,
			height: 19,
			strokeWidth: 0,
			radius: 19
		  }
        },
        markers: {
          size: 6,
		  border:0,
		  colors:['#F46B68','var(--primary)'],
          hover: {
            size: 6,
          }
        },
        xaxis: {
          categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September','October','November','December',
            '10 Jan', '11 Jan', '12 Jan'
          ],
        },
		yaxis: {
			labels: {
		   style: {
			  colors: '#3e4954',
			  fontSize: '14px',
			   fontFamily: 'Poppins',
			  fontWeight: 100,
			  
			},
		  },
		},
		fill: {
			 colors:['#F46B68','var(--rgba-primary-1)'],
			type:'solid',
			opacity: 0.07
		},
        grid: {
          borderColor: '#f1f1f1',
        }
        };
		var chartArea = new ApexCharts(document.querySelector("#chartBar1"), optionsArea);
        chartArea.render();

	}	
	var chartBar2 = function(){
		var optionsArea = {
          series: [{
            name: "Recovered Payment",
            data: [500, 230, 600, 360, 700, 890, 750, 420, 600, 300, 420, 220]
          },
          {
            name: "New payment",
            data: [250, 380, 200, 300, 200, 520,380, 770, 250, 520, 300, 900]
          }
        ],
          chart: {
          height: 350,
          type: 'area',
		  group: 'social',
		  toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [2, 2],
		   colors:['#F46B68','var(--primary)'],
		  curve: 'straight'
        },
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          },
		  markers: {
			colors:['#F46B68','var(--primary)'],
			width: 19,
			height: 19,
			strokeWidth: 0,
			radius: 19
		  }
        },
        markers: {
          size: 6,
		  border:0,
		  colors:['#F46B68','var(--primary)'],
          hover: {
            size: 6,
          }
        },
        xaxis: {
          categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September','October','November','December',
            '10 Jan', '11 Jan', '12 Jan'
          ],
        },
		yaxis: {
			labels: {
		   style: {
			  colors: '#3e4954',
			  fontSize: '14px',
			   fontFamily: 'Poppins',
			  fontWeight: 100,
			  
			},
		  },
		},
		fill: {
			colors:['#F46B68','var(--rgba-primary-1)'],
			type:'solid',
			opacity: 0.07
		},
        grid: {
          borderColor: '#f1f1f1',
        }
        };
		var chartArea = new ApexCharts(document.querySelector("#chartBar2"), optionsArea);
        chartArea.render();

	}	
	
	/* Function ============ */
		return {
			init:function(){
				
			},
			
			
			load:function(){
				lineChart();
				chartBar();
				chartBar1();
				chartBar2();
			},
			
			resize:function(){
				chartBar();
				chartBar1();
				chartBar2();
			}
		}
	
	}();

	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1500); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);