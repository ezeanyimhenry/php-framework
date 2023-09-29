

(function($) {
    /* "use strict" */
	
 var dzChartlist = function(){
	
	var screenWidth = $(window).width();	
	var donutChart1 = function(){
		$("span.donut1").peity("donut", {
			width: "5.75rem",
			height: "5.75rem"
		});
		$(window).resize(function(){
			$("span.donut1").peity("donut", {
				width: "5.75rem",
				height: "5.75rem"
			});
		})
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
					data: [300, 450, 600, 600, 400, 450, 410, 470, 480, 700, 600, 800, 400, 600, 350, 250, 500, 550, 300, 400, 200]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "28%",
					endingShape: "rounded",
					startingShape: "rounded",
					borderRadius: 7,
					
					colors: {
						backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9'],
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
			stroke:{
				 show: true,	
				 lineCap: 'rounded',
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
			  labels: {
			   style: {
				  colors: '#808080',
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
			axisTicks:{
				  show: false,
			},
				
			},
			yaxis: {
			labels: {
			   style: {
				  colors: '#808080',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0) + "k";
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 375,
				options: {
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11'],
					},
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450],
						}
					],
					
				}
			 },
			 {
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480],
						}
					],
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
					}
				}
			 }
			 
			 ]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
		 chartTimelineRender.render();
	}
	var chartTimeline1 = function(){
		
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
					data: [300, 450, 200, 600, 400, 350, 410, 470, 480, 700, 500, 400, 400, 600, 250, 250, 500, 450, 300, 400, 200]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "28%",
					endingShape: "rounded",
					startingShape: "rounded",
					borderRadius: 3,
					
					colors: {
						backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9'],
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
			stroke:{
				 show: true,	
				 lineCap: 'rounded',
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
			  labels: {
			   style: {
				  colors: '#808080',
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
			axisTicks:{
				  show: false,
			},
				
			},
			yaxis: {
			labels: {
			   style: {
				  colors: '#808080',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0) + "k";
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
						}
					],
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
					}
				}
			 }]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline1"), optionsTimeline);
		 chartTimelineRender.render();
	}
	var chartTimeline2 = function(){
		
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
					data: [300, 250, 600, 600, 400, 450, 310, 470, 480, 700, 600, 800, 200, 600, 350, 250, 500, 350, 300, 200, 200]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "28%",
					borderRadius: 6,
					
					colors: {
						backgroundBarColors: ['#E9E9E9', '#E9E9E9', '#E9E9E9', '#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9','#E9E9E9'],
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
			stroke:{
				 show: true,	
				 lineCap: 'rounded',
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
			  labels: {
			   style: {
				  colors: '#808080',
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
			axisTicks:{
				  show: false,
			},
				
			},
			yaxis: {
			labels: {
			   style: {
				  colors: '#808080',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0) + "k";
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
						}
					],
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
					}
				}
			 }]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline2"), optionsTimeline);
		 chartTimelineRender.render();
	}
	var marketChart = function(){
		 var options = {
          series: [{
          name: 'series1',
          data: [200, 300, 200, 300, 200, 300, 200,300]
        }, {
          name: 'series2',
          data: [600, 700, 600, 500, 600, 900, 500, 900]
        }],
          chart: {
          height: 350,
          type: 'line',
		  toolbar:{
			  show:false
		  }
        },
		colors:["#fe7d65","#80ec67"],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
		   width: 7,
        },
		legend:{
			show:false
		},
		grid:{
			borderColor: '#AFAFAF',
			strokeDashArray: 10,
		},
		yaxis: {
		  labels: {
			style: {
				colors: '#787878',
				fontSize: '13px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			},
			formatter: function (value) {
			  return value + "k";
			}
		  },
		},
        xaxis: {
          categories: ["April","May","June","July","August","September","October","November"],
		  labels:{
			  style: {
				colors: '#787878',
				fontSize: '13px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			},
		  },
		  axisBorder:{
			show:false,  
		  },
		  axisTicks:{
			  show: false,
		},
		  
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#marketChart"), options);
        chart.render();
	}
	var pieChart2 = function(){
		 var options = {
          series: [34, 12, 41, 22],
          chart: {
          type: 'donut',
		  height:250
        },
		dataLabels:{
			enabled: false
		},
		stroke: {
          width: 0,
        },
		colors:['#2BC155', '#FF7A30', '#FFEF5F', '#6418C3'],
		legend: {
              position: 'bottom',
			  show:false
            },
        responsive: [{
          breakpoint: 768,
          options: {
           chart: {
			  height:200
			},
			
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#pieChart2"), options);
        chart.render();
    
	}
	
	
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				donutChart1();	
				chartTimeline();
				chartTimeline1();
				chartTimeline2();
				marketChart();
				pieChart2();
				
			},
			
			resize:function(){
				chartTimeline();
				chartTimeline1();
				chartTimeline2();
				marketChart();
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1500); 
		
	});

     

})(jQuery);