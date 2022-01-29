<?php
require_once("../../server/conn.php");
require_once __DIR__ . '../../../vendor/autoload.php';
// PDF
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'Sarabun-Regular.ttf',
            'I' => 'Sarabun-Italic.ttf',
            'B' => 'Sarabun-Bold.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);

// Sql
$data = [
    'id' => $_GET['id']
];
$sql = "SELECT * FROM customers WHERE cust_no = :id";
$query = $conn->prepare($sql);
$query->execute($data);
$row = $query->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <?php require("../component/link_header.php") ?>
    <link rel="stylesheet" href="../../assets/style/stylePrint.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php require("../component/manu.php") ?>
    <!-- เนื้อหา -->
    <div class="row">
        <div class="m-2">
            <a href="./customers.pdf" target="_blank" class="btn btn-info">Exoprt PDF</a>
        </div>
    </div>
    <embed src="customers.pdf" type="application/pdf" frameBorder="0" scrolling="auto" height="720px" width="100%" />
    <div class="row">

        <?php ob_start();  ?>
        <!-- Start PDF -->
        <div class="a4 p-5 d-none">
            <div class="row mt-5">
                <div class="row">
                    <div class="col-6">
                        <img src=" <?php echo "data:" . $row["image_type"] . ";base64," . base64_encode($row["image_data"]) ?>" class="myImgList">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                รหัสลูกค้า : <?php echo  $row['cust_no']  ?>
                            </div>
                            <div class="col-12">
                                ชื่อลูกค้า : <?php echo  $row['cust_name']  ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">
                        ถนน : <?php echo  $row['cust_street']  ?>
                    </div>
                    <div class="col-6">
                        เขต : <?php echo  $row['cust_state']  ?>
                    </div>
                    <div class="col-6">
                        จังหวัด : <?php echo  $row['cust_city']  ?>
                    </div>
                    <div class="col-6">
                        รหัสไปรษณีย์ : <?php echo  $row['cust_zip']  ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        ชื่อผู้ส่ง: <?php echo  $row['ship_to_name']  ?>
                    </div>
                    <div class="col-6">
                        ถนน: <?php echo  $row['ship_to_street']  ?>
                    </div>
                    <div class="col-6">
                        จังหวัด: <?php echo  $row['ship_to_city']  ?>
                    </div>
                    <div class="col-6">
                        เขต: <?php echo  $row['ship_to_state']  ?>
                    </div>
                    <div class="col-6">
                        รหัสไปรษณีย์: <?php echo  $row['ship_to_zip']  ?>
                    </div>
                    <div class="col-6">
                        วงเงิน: <?php echo  number_format($row['credit_limit'])  ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stop PDF -->
        <?php
        $html =  ob_get_contents();
        $stylesheet = file_get_contents('../../assets/style/stylePrint.css');
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output("customers.pdf");
        ob_end_flush();
        ?>
    </div>
    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
</body>

</html>