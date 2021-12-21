<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <?php require("link_header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php require("manu.php") ?>
    <!-- เนื้อหา -->
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ชื่อเรื่อง</th>
                <th>ชื่อเรื่อง</th>
                <th>ชื่อเรื่อง</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 50; $i++) :  ?>
                <tr>
                    <td> <?php echo $i ?>Lorem, ipsum dolor.</td>
                    <td> <?php echo $i ?>Lorem, ipsum dolor.</td>
                    <td> <?php echo $i ?>Lorem, ipsum dolor.</td>
                </tr>
            <?php endfor  ?>
        </tbody>
    </table>
    <!-- เนื้อหา -->
    <?php require("link_footer.php") ?>
    <script>
        $(function() {
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>