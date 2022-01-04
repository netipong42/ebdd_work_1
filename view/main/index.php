<?php
require_once("../../server/conn.php");
$sql = "SELECT i.item_no ,i.qty_on_hand , i.item_name  FROM inventory AS i ORDER BY qty_on_hand DESC";
$query = $conn->prepare($sql);
$query->execute();
$row = $query->fetchAll(PDO::FETCH_ASSOC);
$rowChart = json_encode($row);
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
            let myData = <?php echo $rowChart ?>;
            let myDatabars = [];
            let myDataName = [];

            myData.forEach((res, index) => {
                myDatabars.push([parseInt(index + 1), parseInt(res.qty_on_hand)])
                myDataName.push([parseInt(index + 1), `${res.item_name}`])
            })
            var bar_data = {
                data: myDatabars,
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
                    ticks: myDataName,
                }
            })
        }
        barChart();
    </script>
</body>

</html>