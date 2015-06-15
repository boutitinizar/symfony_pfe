var ChartsFlotcharts = function() {

    return {
        //main function to initiate the module

        init: function() {

            Metronic.addResizeHandler(function() {
                Charts.initPieCharts();
            });

        },

        initCharts: function() {

            if (!jQuery.plot) {
                return;
            }

            var data = [];
            var totalPoints = 250;

            // random data generator for plot charts

            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;
            }

            //Basic Chart

            function chart1() {
                if ($('#chart_1').size() != 1) {
                    return;
                }

                var d1 = [];
                for (var i = 0; i < Math.PI * 2; i += 0.25)
                    d1.push([i, Math.sin(i)]);

                var d2 = [];
                for (var i = 0; i < Math.PI * 2; i += 0.25)
                    d2.push([i, Math.cos(i)]);

                var d3 = [];
                for (var i = 0; i < Math.PI * 2; i += 0.1)
                    d3.push([i, Math.tan(i)]);

                $.plot($("#chart_1"), [{
                    label: "sin(x)",
                    data: d1,
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0
                }, {
                    label: "cos(x)",
                    data: d2,
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0
                }, {
                    label: "tan(x)",
                    data: d3,
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0
                }], {
                    series: {
                        lines: {
                            show: true,
                        },
                        points: {
                            show: true,
                            fill: true,
                            radius: 3,
                            lineWidth: 1
                        }
                    },
                    xaxis: {
                        tickColor: "#eee",
                        ticks: [0, [Math.PI / 2, "\u03c0/2"],
                            [Math.PI, "\u03c0"],
                            [Math.PI * 3 / 2, "3\u03c0/2"],
                            [Math.PI * 2, "2\u03c0"]
                        ]
                    },
                    yaxis: {
                        tickColor: "#eee",
                        ticks: 10,
                        min: -2,
                        max: 2
                    },
                    grid: {
                        borderColor: "#eee",
                        borderWidth: 1
                    }
                });

            }

            //Interactive Chart

            function chart2() {
                if ($('#chart_2').size() != 1) {
                    return;
                }

                function randValue() {
                    return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
                }
                var pageviews = [
                    [1,252],
                    [2, 250],
                    [3, 255],
                    [4, 126],
                    [5, 258],
                    [6, 257],
                    [7,252],
                    [8, 251],

                ];
                var visitors = [
                    [1, 252],
                    [2, 252],
                    [3, 252],
                    [4, 252],
                    [5, 252],
                    [6,252],
                    [7,252],
                    [8, 252],

                ];
                var limite1 = [
                    [1, 289],
                    [2, 289],
                    [3, 289],
                    [4, 289],
                    [5, 289],
                    [6,289],
                    [7,289],
                    [8, 289],

                ];
                var limite2 = [
                    [1, 315],
                    [2, 315],
                    [3, 315],
                    [4, 315],
                    [5, 315],
                    [6,315],
                    [7,315],
                    [8, 315],

                ];
                var limite3 = [
                    [1, 340],
                    [2, 340],
                    [3, 340],
                    [4, 340],
                    [5, 340],
                    [6,340],
                    [7,340],
                    [8, 340],

                ];

                var plot = $.plot($("#chart_2"), [{
                    data: pageviews,
                    label: "Kosu",
                    lines: {
                        lineWidth: 4,
                    },
                    shadowSize: 0

                }, {
                    data: visitors,
                    label: "Objectif kosu",
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0
                }, {
                    data: limite1,
                    label: "limit Superviseur",
                    lines: {
                        lineWidth:1,
                    },
                    shadowSize: 0
                }, {
                    data: limite2,
                    label: "limit Responsable",
                    lines: {
                        lineWidth:1,
                    },
                    shadowSize: 0
                }, {
                    data: limite3,
                    label: "Directeur D'usine",
                    lines: {
                        lineWidth:1,
                    },
                    shadowSize: 0
                }], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 10,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: 0.05
                                }, {
                                    opacity: 0.01
                                }]
                            }
                        },
                        points: {
                            show: true,
                            radius: 3,
                            lineWidth: 1
                        },
                        shadowSize:4
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderColor: "#eee",
                        borderWidth: 1
                    },
                    colors: ["#99cc66", "#00ccff", "#ffcc99","#ff6666","#993300"],
                    xaxis: {
                        min: 1,
                        max: 9,
                        ticks: 5,
                        tickDecimals: 0,
                        tickColor: "#eee",
                    },
                    yaxis: {
                        min: 100,
                        max: 400,
                        ticks:10,
                        tickDecimals:0,
                        tickColor: "#eee",
                    }
                });


                function showTooltip(x, y, contents) {
                    $('<div id="tooltip">' + contents + '</div>').css({
                        position: 'absolute',
                        display: 'none',
                        top: y + 2,
                        left: x + 15,
                        border: '1px solid #333',
                        padding: '4px',
                        color: '#fff',
                        'border-radius': '3px',
                        'background-color': '#333',
                        opacity: 0.80
                    }).appendTo("body").fadeIn(200);
                }

                var previousPoint = null;
                $("#chart_2").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(0));
                    $("#y").text(pos.y.toFixed(0));

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(0),
                                y = item.datapoint[1].toFixed(0);

                            showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }



            function chart3() {
                if ($('#chart_3').size() != 1) {
                    return;
                }

                function randValue() {
                    return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
                }
                var pageviews = [
                    [1,9],
                    [2, 9],
                    [3, 9],
                    [4, 9],
                    [5, 9],
                    [6, 9],
                    [7,9],
                    [8, 9],

                ];
                var visitors = [
                    [1, 252],
                    [2, 252],
                    [3, 252],
                    [4, 252],
                    [5, 252],
                    [6,252],
                    [7,252],
                    [8, 252],

                ];
                var limite1 = [
                    [1, 289],
                    [2, 289],
                    [3, 289],
                    [4, 289],
                    [5, 289],
                    [6,289],
                    [7,289],
                    [8, 289],

                ];
                var limite2 = [
                    [1, 315],
                    [2, 315],
                    [3, 315],
                    [4, 315],
                    [5, 315],
                    [6,315],
                    [7,315],
                    [8, 315],

                ];
                var limite3 = [
                    [1, 340],
                    [2, 340],
                    [3, 340],
                    [4, 340],
                    [5, 340],
                    [6,340],
                    [7,340],
                    [8, 340],

                ];

                var plot = $.plot($("#chart_3"), [{
                    data: pageviews,
                    label: "Suivi mod",
                    lines: {
                        lineWidth: 4,
                    },
                    shadowSize: 0

                }  ], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 10,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: 0.05
                                }, {
                                    opacity: 0.01
                                }]
                            }
                        },
                        points: {
                            show: true,
                            radius: 3,
                            lineWidth: 1
                        },
                        shadowSize:4
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderColor: "#eee",
                        borderWidth: 1
                    },
                    colors: ["#99cc66", "#00ccff", "#ffcc99","#ff6666","#993300"],
                    xaxis: {
                        min: 1,
                        max: 9,
                        ticks: 5,
                        tickDecimals: 0,
                        tickColor: "#eee",
                    },
                    yaxis: {
                        min: 1,
                        max: 14,
                        ticks:10,
                        tickDecimals:0,
                        tickColor: "#eee",
                    }
                });


                function showTooltip(x, y, contents) {
                    $('<div id="tooltip">' + contents + '</div>').css({
                        position: 'absolute',
                        display: 'none',
                        top: y + 2,
                        left: x + 15,
                        border: '1px solid #333',
                        padding: '4px',
                        color: '#fff',
                        'border-radius': '3px',
                        'background-color': '#333',
                        opacity: 0.80
                    }).appendTo("body").fadeIn(200);
                }

                var previousPoint = null;
                $("#chart_3").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(0));
                    $("#y").text(pos.y.toFixed(0));

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(0),
                                y = item.datapoint[1].toFixed(0);

                            showTooltip(item.pageX, item.pageY, item.series.label + " de "  + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }


            //Tracking Curves

            //Dynamic Chart

            function chart4() {
                if ($('#chart_4').size() != 1) {
                    return;
                }
                //server load
                var options = {
                    series: {
                        shadowSize: 1
                    },
                    lines: {
                        show: true,
                        lineWidth: 0.5,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.1
                            }, {
                                opacity: 1
                            }]
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        tickColor: "#eee",
                        tickFormatter: function(v) {
                            return v + "%";
                        }
                    },
                    xaxis: {
                        show: false,
                    },
                    colors: ["#6ef146"],
                    grid: {
                        tickColor: "#eee",
                        borderWidth: 0,
                    }
                };

                var updateInterval = 30;
                var plot = $.plot($("#chart_4"), [getRandomData()], options);

                function update() {
                    plot.setData([getRandomData()]);
                    plot.draw();
                    setTimeout(update, updateInterval);
                }
                update();
            }

            //bars with controls

            function chart5() {
                if ($('#chart_5').size() != 1) {
                    return;
                }
                var d1 = [];
                for (var i = 0; i <= 10; i += 1)
                    d1.push([i, parseInt(Math.random() * 30)]);

                var d2 = [];
                for (var i = 0; i <= 10; i += 1)
                    d2.push([i, parseInt(Math.random() * 30)]);

                var d3 = [];
                for (var i = 0; i <= 10; i += 1)
                    d3.push([i, parseInt(Math.random() * 30)]);

                var stack = 0,
                    bars = true,
                    lines = false,
                    steps = false;

                function plotWithOptions() {
                    $.plot($("#chart_5"),

                        [{
                            label: "sales",
                            data: d1,
                            lines: {
                                lineWidth: 1,
                            },
                            shadowSize: 0
                        }, {
                            label: "tax",
                            data: d2,
                            lines: {
                                lineWidth: 1,
                            },
                            shadowSize: 0
                        }, {
                            label: "profit",
                            data: d3,
                            lines: {
                                lineWidth: 1,
                            },
                            shadowSize: 0
                        }]

                        , {
                            series: {
                                stack: stack,
                                lines: {
                                    show: lines,
                                    fill: true,
                                    steps: steps,
                                    lineWidth: 0, // in pixels
                                },
                                bars: {
                                    show: bars,
                                    barWidth: 0.5,
                                    lineWidth: 0, // in pixels
                                    shadowSize: 0,
                                    align: 'center'
                                }
                            },
                            grid: {
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        }
                    );
                }

                $(".stackControls input").click(function(e) {
                    e.preventDefault();
                    stack = $(this).val() == "With stacking" ? true : null;
                    plotWithOptions();
                });

                $(".graphControls input").click(function(e) {
                    e.preventDefault();
                    bars = $(this).val().indexOf("Bars") != -1;
                    lines = $(this).val().indexOf("Lines") != -1;
                    steps = $(this).val().indexOf("steps") != -1;
                    plotWithOptions();
                });

                plotWithOptions();
            }

            //graph
            chart1();
            chart2();
            chart3();
            chart4();
            chart5();

        },

        initBarCharts: function() {

            // bar chart:
            var data = GenerateSeries(0);

            function GenerateSeries(added) {
                var data = [];
                var start = 100 + added;
                var end = 200 + added;

                for (i = 1; i <= 20; i++) {
                    var d = Math.floor(Math.random() * (end - start + 1) + start);
                    data.push([i, d]);
                    start++;
                    end++;
                }

                return data;
            }

            var options = {
                series: {
                    bars: {
                        show: true
                    }
                },
                bars: {
                    barWidth: 0.8,
                    lineWidth: 0, // in pixels
                    shadowSize: 0,
                    align: 'left'
                },

                grid: {
                    tickColor: "#eee",
                    borderColor: "#eee",
                    borderWidth: 1
                }
            };

            if ($('#chart_1_1').size() !== 0) {
                $.plot($("#chart_1_1"), [{
                    data: data,
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0
                }], options);
            }

            // horizontal bar chart:

            var data1 = [
                [10, 10],
                [20, 20],
                [30, 30],
                [40, 40],
                [50, 50]
            ];

            var options = {
                series: {
                    bars: {
                        show: true
                    }
                },
                bars: {
                    horizontal: true,
                    barWidth: 6,
                    lineWidth: 0, // in pixels
                    shadowSize: 0,
                    align: 'left'
                },
                grid: {
                    tickColor: "#eee",
                    borderColor: "#eee",
                    borderWidth: 1
                }
            };

            if ($('#chart_1_2').size() !== 0) {
                $.plot($("#chart_1_2"), [data1], options);
            }
        },

        initPieCharts: function() {

            var data = [];
            var series = Math.floor(Math.random() * 10) + 1;
            series = series < 5 ? 5 : series;

            for (var i = 0; i < series; i++) {
                data[i] = {
                    label: "Series" + (i + 1),
                    data: Math.floor(Math.random() * 100) + 1
                };
            }

            // DEFAULT
            if ($('#pie_chart').size() !== 0) {
                $.plot($("#pie_chart"), data, {
                    series: {
                        pie: {
                            show: true
                        }
                    }
                });
            }

            // GRAPH 1
            if ($('#pie_chart_1').size() !== 0) {
                $.plot($("#pie_chart_1"), data, {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 2
            if ($('#pie_chart_2').size() !== 0) {
                $.plot($("#pie_chart_2"), data, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 1,
                                formatter: function(label, series) {
                                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                },
                                background: {
                                    opacity: 0.8
                                }
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 3
            if ($('#pie_chart_3').size() !== 0) {
                $.plot($("#pie_chart_3"), data, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 3 / 4,
                                formatter: function(label, series) {
                                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                },
                                background: {
                                    opacity: 0.5
                                }
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 4
            if ($('#pie_chart_4').size() !== 0) {
                $.plot($("#pie_chart_4"), data, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 3 / 4,
                                formatter: function(label, series) {
                                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                },
                                background: {
                                    opacity: 0.5,
                                    color: '#000'
                                }
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 5
            if ($('#pie_chart_5').size() !== 0) {
                $.plot($("#pie_chart_5"), data, {
                    series: {
                        pie: {
                            show: true,
                            radius: 3 / 4,
                            label: {
                                show: true,
                                radius: 3 / 4,
                                formatter: function(label, series) {
                                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                },
                                background: {
                                    opacity: 0.5,
                                    color: '#000'
                                }
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 6
            if ($('#pie_chart_6').size() !== 0) {
                $.plot($("#pie_chart_6"), data, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 2 / 3,
                                formatter: function(label, series) {
                                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                },
                                threshold: 0.1
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 7
            if ($('#pie_chart_7').size() !== 0) {
                $.plot($("#pie_chart_7"), data, {
                    series: {
                        pie: {
                            show: true,
                            combine: {
                                color: '#999',
                                threshold: 0.1
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 8
            if ($('#pie_chart_8').size() !== 0) {
                $.plot($("#pie_chart_8"), data, {
                    series: {
                        pie: {
                            show: true,
                            radius: 300,
                            label: {
                                show: true,
                                formatter: function(label, series) {
                                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                },
                                threshold: 0.1
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // GRAPH 9
            if ($('#pie_chart_9').size() !== 0) {
                $.plot($("#pie_chart_9"), data, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            tilt: 0.5,
                            label: {
                                show: true,
                                radius: 1,
                                formatter: function(label, series) {
                                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                },
                                background: {
                                    opacity: 0.8
                                }
                            },
                            combine: {
                                color: '#999',
                                threshold: 0.1
                            }
                        }
                    },
                    legend: {
                        show: false
                    }
                });
            }

            // DONUT
            if ($('#donut').size() !== 0) {
                $.plot($("#donut"), data, {
                    series: {
                        pie: {
                            innerRadius: 0.5,
                            show: true
                        }
                    }
                });
            }

            // INTERACTIVE
            if ($('#interactive').size() !== 0) {
                $.plot($("#interactive"), data, {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                });
                $("#interactive").bind("plothover", pieHover);
                $("#interactive").bind("plotclick", pieClick);
            }

            function pieHover(event, pos, obj) {
                if (!obj)
                    return;
                percent = parseFloat(obj.series.percent).toFixed(2);
                $("#hover").html('<span style="font-weight: bold; color: ' + obj.series.color + '">' + obj.series.label + ' (' + percent + '%)</span>');
            }

            function pieClick(event, pos, obj) {
                if (!obj)
                    return;
                percent = parseFloat(obj.series.percent).toFixed(2);
                alert('' + obj.series.label + ': ' + percent + '%');
            }

        }

    };

}();