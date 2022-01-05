<?php
require_once("../../server/conn.php");

// Bar
$sqlBar = "SELECT i.item_no ,i.qty_on_hand , i.item_name  FROM inventory AS i ORDER BY qty_on_hand DESC";
$queryBar = $conn->prepare($sqlBar);
$queryBar->execute();
$rowBar = $queryBar->fetchAll();
$rowChartBar = json_encode($rowBar);

// Donut
$sqlDonut = "SELECT 
            SUM(i.qty_on_hand) AS sum ,
            s.sup_company
            FROM inventory AS i
            INNER JOIN suppliers AS s 
            ON i.sup_no = s.sup_no
            GROUP BY s.sup_no
            ";
$queryDonut = $conn->prepare($sqlDonut);
$queryDonut->execute();
$rowDonut = $queryDonut->fetchAll();
$rowChartDonut = json_encode($rowDonut);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <?php require("../component/link_header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php require("../component/manu.php") ?>
    <!-- เนื้อหา -->
    <h1>Hello Word!!!</h1>
    <!-- BAR CHART -->
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Bar Chart
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="bar-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Donut chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Donut Chart
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="donut-chart" style="height: 300px;"></div>
                </div>
                <!-- /.card-body-->
            </div>
        </div>
    </div>
    <!-- BAR CHART -->
    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
    <!-- FLOT CHARTS -->
    <script src="../../assets/theme/plugins/flot/jquery.flot.js"></script>
    <script src="../../assets/theme/plugins/flot/plugins/jquery.flot.resize.js"></script>
    <script src="../../assets/theme/plugins/flot/plugins/jquery.flot.pie.js"></script>
    <script>
        function barChart() {
            let dataBar = <?php echo $rowChartBar ?>;
            let numBar = dataBar.map((res, index) => (
                [index, parseInt(res.qty_on_hand)]
            ));
            let nameBar = dataBar.map((res, index) => (
                [index, res.item_name]
            ));
            var bar_data = {
                data: numBar,
                bars: {
                    show: true
                }
            }
            $.plot('#bar-chart', [bar_data], {
                grid: {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor: '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.5,
                        align: 'center',
                    },
                },
                colors: ['#1d1d1d'],
                xaxis: {
                    ticks: nameBar,
                }
            })
        }

        function donutChart() {
            let dataDonut = <?php echo $rowChartDonut ?>;
            let Data = dataDonut.map((res) => ({
                'label': res.sup_company,
                'data': parseInt(res.sum),
                'color': '#1d1d1d'
            }));
            $.plot('#donut-chart', Data, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.5,
                        label: {
                            show: true,
                            radius: 2 / 3,
                            formatter: labelFormatter,
                            threshold: 0.1
                        }

                    }
                },
                legend: {
                    show: false,
                }
            })
        }

        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
                label +
                '<br>' +
                Math.round(series.percent) + '%</div>'
        }
        barChart();
        donutChart();
    </script>
</body>

</html>