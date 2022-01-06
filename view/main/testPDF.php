<?php

require_once __DIR__ . '../../../vendor/autoload.php';

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

?>
<?php ob_start();  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <?php require("../component/link_header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- เนื้อหา -->
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>คะแนน</th>
                    <th>บันทึก</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++) :  ?>
                    <tr>
                        <td><?php echo $i += 1   ?></td>
                        <td>เนติพงษ์</td>
                        <td>พาภักดี</td>
                        <td>99</td>
                        <td>ผ่าน</td>
                    </tr>
                <?php endfor  ?>
            </tbody>
        </table>
        <div>
            <a href="./testPDF.pdf" target="_blank" class="btn btn-success">Export PDF</a>
        </div>
    </div>
    <?php
    $html =  ob_get_contents();
    $stylesheet = file_get_contents('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output("testPDF.pdf");
    ob_end_flush();
    ?>
    <!-- เนื้อหา -->
</body>

</html>