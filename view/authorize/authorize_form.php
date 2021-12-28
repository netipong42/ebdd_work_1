<?php
require_once("../../server/conn.php");

try {
    $slqSelect = "SELECT * FROM authorize as z 
        LEFT JOIN users as a
        ON z.user_no = a.user_no
    ";
    $querySelect = $conn->prepare($slqSelect);
    $querySelect->execute();
    $row = $querySelect->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
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
    <div class="">
        <div class="card">
            <div class="card-header">
                <h1>List Authorize</h1>
                <a href="./authorize_form.php" class="btn btn-success my-3">Add</a>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>user_name</th>
                            <th>user_login</th>
                            <th>module_no</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $item) :  ?>
                            <tr>
                                <td> <?php echo $item["user_name"] ?> </td>
                                <td> <?php echo $item["user_login"] ?> </td>
                                <td> <?php echo $item["module_no"] ?> </td>
                                <td>
                                    <a href="./authorize_edit.php?id=<?php echo $item["user_no"] ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <a href="../../server/authorize/authorize_delete.php?id=<?php echo $item["user_no"] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
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