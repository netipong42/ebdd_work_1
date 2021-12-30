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
    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
    <script>
        function confirmAlert() {
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
                    location.assign(``);
                }
            })
        }
    </script>
</body>

</html>