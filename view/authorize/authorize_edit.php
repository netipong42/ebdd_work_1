<?php
require_once("../../server/conn.php");

$data = ['id' => $_GET['id']];
$sql = "SELECT 
        u.user_no,
        u.user_name,
        a.module_no
        FROM users AS u
        INNER JOIN authorize AS a
        ON u.user_no = a.user_no 
        WHERE u.user_no =:id
        ";
$query = $conn->prepare($sql);
$query->execute($data);
$row = $query->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="col-md-6 mx-auto">
            <div class="card card-warning">
                <div class="card-header">
                    <h1>Authorize Edit</h1>
                </div>
                <div class="card-body">
                    <h3><?php echo $row[0]['user_name'] ?></h3>
                    <div>
                        <ul class="list-group">
                            <?php foreach ($row as $item) :  ?>
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <?php echo $item['module_no']  ?>
                                    <button onClick="confirmAlert('<?php echo $item["user_no"] ?>','<?php echo $item["module_no"] ?>')" class="btn btn-danger"><i class="fas fa-backspace"></i></button>
                                </li>
                            <?php endforeach  ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
    <script>
        function confirmAlert(id, module_no) {
            Swal.fire({
                icon: `warning`,
                title: `ยืนยันการลบ`,
                text: `ต้องการลบข้อมูลหรือไม่`,
                showCancelButton: true,
                cancelButtonText: `ยกเลิก`,
                cancelButtonColor: `#E74A3B`,
                confirmButtonText: `ตกลง`,
                confirmButtonColor: `#1CC88A`,
            }).then((res) => {
                if (res.isConfirmed) {
                    location.assign(`../../server/authorize/authorize_delete.php?id=${id}&module=${module_no}`);
                }
            })
        }
    </script>
</body>

</html>