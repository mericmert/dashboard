<?php
    include dirname(__FILE__) . "/../database/connection.php";
    $query = mysqli_query($dbconnect, "SELECT COUNT(*) as 'count' FROM employees")
        or die(mysqli_error($dbconnect));
    $row = mysqli_fetch_assoc($query);
    $count = $row['count'];
    $query_managers = mysqli_query($dbconnect, "SELECT COUNT(*) as 'count' FROM manager")
        or die(mysqli_error($dbconnect));
    $row_managers = mysqli_fetch_assoc($query_managers);
    $count_managers = $row_managers['count'];
    include dirname(__FILE__) . "/../graphs/barchart.php";
    include dirname(__FILE__) . "/../graphs/scatter.php";

?>


<div class="main-line">
    <div class="main-container">
        <div class="left-container">
            <div class="card-container">
                <div class="employee-card">
                    <div class="employee-top">
                        <div class="stats">
                            <h1><?php echo $count ?></h1>
                            <span>Employees</span>
                        </div>
                        <i class="user friends icon"></i>
                    </div>
                    <button><a href="/employees">More Info <i class="angle double right icon"></i></a></button>
                </div>
                <div class="employee-card">
                    <div class="employee-top">
                        <div class="stats">
                            <h1>0</h1>
                            <span>Manager</span>
                        </div>
                        <i class="user tie icon big"></i>
                    </div>
                    <button><a href="/managers">More Info <i class="angle double right icon"></i></a></button>
                </div>
                <div id="pie-chart" class="pie"></div>
    
            </div>
            <div class="graph-container">
                <div id="bar-chart" class="bar chart-container"></div>
                <div id="scatter-chart" class="line chart-container"></div>
            </div>
        </div>
        <div class="right-container">
            <button id="add-todo"><i class="plus circle icon large"></i></button>
            <button id="close-todo"><i class="chevron circle up icon large"></i></button>
            <div class="todo-container">
                <table class="ui fixed single line celled table">
                    <thead>
                      <th>TO DO</th>
                    </thead>
                    <tbody id="todo-body">
                        
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="ui small modal" id="add_user_modal">
  <div class="header">New Task</div>
  <div class="content">
    <form class="ui form" id="user_form">
      <div class="two fields">
        <div class="field">
          <input type="text" id="todo-task" name="task" placeholder="Today I want to do ....">
        </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <div id="todo-confirm" class="ui blue approve button" data-value="send">Add</div>
    <div id="cancel-todo" class="ui red cancel button" data-value="cancel">Cancel</div>
  </div>
</div>

    <div class="homepage-stats">
        <div class="feature-out">
            <div class="feature-icon"><a href="#bar-chart"><i id="chart-icon" class="chart bar icon"></i></a></div>
            <span class="feature-text">Informative</span>
        </div>
        <div class="feature-out">
            <div class="feature-icon"><a href="#"><i class="calendar alternate icon"></i></a></div>
            <span class="feature-text">Up-to-date</span>
        </div>
        <div class="feature-out">
            <div class="feature-icon"><a href="#"><i class="check icon"></i></a></div>
            <span class="feature-text">Realiable</span>
        </div>
    </div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    $('document').ready(() => {
        $("#user_form").submit((e) => {
            console.log("Submit")
            e.preventDefault();
        })
        fetchToDo();
        function fetchToDo() {
            $.ajax({
               type: "GET",
               url: "../CRUD/fetch_todo.php",
               dataType: "html",
               success : function(response){
                   $("#todo-body").html(response);
               }
            });
        }
        setInterval(() => {
            fetchToDo();
        }, 5000);


        var arrow = false;
        $("#close-todo").click(() => {
            $("#todo-body").transition('toggle');
            arrow = !arrow
            arrow ? $("#close-todo").css("transform","rotate(180deg)") : $("#close-todo").css("transform","rotate(360deg)");
        })
        $("#add-todo").click(() => {
            $("#add_user_modal").modal("setting", {
                closable: false,
                onApprove: function () {
                    return true;
                }
            }).modal("show");
        });
        $("#todo-confirm").click(function(){
            const task = $("#todo-task").val();
                if(task === "") alert("You need to fill the input field!");
                else{
                    $.ajax({
                        url: "../CRUD/add_todo.php",
                        type: "POST",
                        data : {
                            task : task
                        },
                        cache: false,
                    })
                }
                $(".ui.modal").modal("hide");
            fetchToDo();

        });
        $('.feature-icon')
            .transition('zoom')
            .transition('zoom');
        const barData = <?php echo json_encode($data_bar); ?>.map(Number);
        const scatterData = <?php echo json_encode($scatter_data); ?>.map((arr) => arr.map(Number));
        const employeeCount = <?php echo $count ?> ;
        const managerCount = <?php echo $count_managers ?> ;
        const bar_chart = Highcharts.chart('bar-chart', {
            chart: {
                backgroundColor: '#ebebeb',
                type: 'column'
            },
            title: {
                text: 'The number of employees with respect to their age'
            },
            xAxis: {
                allowDecimals: false,
                categories: ['15-25', '26-35', '36-45', '46-50', '50+']
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'The number of employee'
                }
            },
            series: [{
                name: 'The number of employee',
                data: barData
            }, ]
        });
        const scatter_chart = Highcharts.chart('scatter-chart', {
            chart: {
                backgroundColor: '#ebebeb',
                type: 'scatter',
                zoomType: 'xy'
            },
            title: {
                text: 'The relationship between contract time and salary'
            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Contract Time (years)'
                },
                startOnTick: true,
                endOnTick: true,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Salary (TL)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                backgroundColor: Highcharts.defaultOptions.chart.backgroundColor,
                borderWidth: 1
            },
            plotOptions: {
                scatter: {
                    marker: {
                        radius: 5,
                        states: {
                            hover: {
                                enabled: true,
                                lineColor: 'rgb(100,100,100)'
                            }
                        }
                    },
                    states: {
                        hover: {
                            marker: {
                                enabled: false
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<b>{series.name}</b><br>',
                        pointFormat: '{point.x} years, {point.y} TL'
                    }
                }
            },
            series: [{
                name: '',
                color: 'rgba(223, 83, 83, .5)',
                data: scatterData
            }]
        });
        const pie_chart = Highcharts.chart('pie-chart', {
            chart: {
                backgroundColor: "#dfdfdf",
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    colors: [
                        '#178a77',
                        '#ED561B',
                    ],
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Ratio',
                colorByPoint: true,
                data: [{
                        name: 'Employees',
                        y: employeeCount,
                        sliced: true,
                        selected: true
                    },
                    {
                        name: 'Managers',
                        y: managerCount
                    }
                ]
            }]
        });
    });
</script>