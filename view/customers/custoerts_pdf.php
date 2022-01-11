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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php require("../component/manu.php") ?>
    <!-- เนื้อหา -->
    <div class="row">
        <div class="row">
            <div> <a href="./customers.pdf" target="_blank" class="btn btn-info">Exoprt PDF</a></div>
        </div>
        <?php ob_start();  ?>
        <!-- Start PDF -->
        <div class="row mt-5">
            <div class="col-12">
                <img src=" <?php echo "data:" . $row["image_type"] . ";base64," . base64_encode($row["image_data"]) ?>" class="myImgList">
            </div>
            <div class="row">
                <div class="col-6">
                    cust_no : <?php echo  $row['cust_no']  ?>
                </div>
                <div class="col-6">
                    cust_name : <?php echo  $row['cust_name']  ?>
                </div>
                <div class="col-6">
                    cust_street : <?php echo  $row['cust_street']  ?>
                </div>
                <div class="col-6">
                    cust_city : <?php echo  $row['cust_city']  ?>
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