(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var donutChart1 = function(){
		$("span.donut1").peity("donut", {
			width: "90",
			height: "90"
		});
	}
	var chartTimeline = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 200,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: -10,
			},
			series: [
				 {
					name: "New Clients",
					data: [75, 150, 225, 200, 35, 50, 150, 89, 50, 78, 50, 60, 40, 160, 90, 40]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "25%",
					endingShape: "rounded",
					startingShape: "rounded",
					
					colors: {
						backgroundBarColors: ['#f0f0f0', '#f0f0f0', '#f0f0f0', '#f0f0f0','#f0f0f0','#f0f0f0','#f0f0f0','#f0f0f0'],
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			colors:['var(--primary)'],
			grid: {
				show: false,
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21'],
			  labels: {
			   style: {
				  colors: '#787878',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			},
			
			yaxis: {
				show: false
			},
			
			tooltip: {
				x: {
					show: true
				}
			}
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
		 chartTimelineRender.render();
	}
	var chartBar = function() {
		var options = {
          series: [{
          name: 'series1',
          data: [800, 440, 360, 510, 420, 680, 400,200,700]
        }, {
          name: 'series2',
          data: [210, 320, 130, 320, 150, 310, 120,620,320]
        }],
          chart: {
          height: 350,
          type: 'area',
		  toolbar:false
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
		  width: 4,
		  colors: ['#80ec67','#fe7d65'],
        },
		legend: {
			show: false,
		},
		 markers: {
          size: 0,
		  border:0,
		  colors: ['#80ec67','#fe7d65'],
          hover: {
            size: 7,
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
			 formatter: function (y) {
					  return y.toFixed(0) + "k";
					}
		  },
		},
		xaxis: {
          type: 'month',
          categories: ["April", "May", "June", "July", "August", "September", "October", "November", "Dec.."]
        },
		colors: ['#80ec67','#fe7d65'],
		fill: {
			colors: ['#80ec67','#fe7d65'],
		},
        tooltip: {
          x: {
            format: 'month'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chartBar"), options);
        chart.render();
	}
	var monocromeChart = function(){
		var options = {
          series: [38, 62],
          chart: {
          width: '100%',
          type: 'pie',
        },
        labels: ["", ""],
        theme: {
          monochrome: {
            enabled: true
          }
        },
        plotOptions: {
          pie: {
            dataLabels: {
              offset: -5
            }
          }
        },
		fill: {
			colors:['#FFB067','var(--primary)']
		},
		
        dataLabels: {
			textAnchor: 'middle',
			style: {
			  colors: ["#fff"],
			  fontSize: '16px',
			  fontWeight: 'light',
			},
			dropShadow: {
			  enabled: false,
		  },
          formatter(val, opts) {
            const name = opts.w.globals.labels[opts.seriesIndex]
            return [name, val.toFixed() + '%']
          }
        },
        legend: {
          show: false
        }
        };

        var chart = new ApexCharts(document.querySelector("#monocromeChart"), options);
        chart.render();
	}
	
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				donutChart1();
				chartTimeline();
				chartBar();
				monocromeChart();
				
			},
			
			resize:function(){
				vmap('resize');
			}
		}
	
	}();

	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		setTimeout(function(){
			dzChartlist.resize();
		}, 1500); 
		
	});     

})(jQuery);