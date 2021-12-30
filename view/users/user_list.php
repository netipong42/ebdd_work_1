<?php
require_once("../../server/conn.php");

try {
    $slqSelect = "SELECT * FROM users";
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
    <div class="card">
        <div class="card-header">
            <h1>List Users</h1>
            <a href="./user_form.php" class="btn btn-success my-3">Add</a>
        </div>

        <div class="card-body">
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>user_email</th>
                        <th>user_name</th>
                        <th>user_login</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $item) :  ?>
                        <tr>
                            <td>
                                <img src="<?php echo "data:" . $item["image_type"] . ";base64," . base64_encode($item["image_data"]) ?>" class="myImgList">
                            </td>
                            <td> <?php echo $item["user_email"] ?> </td>
                            <td> <?php echo $item["user_name"] ?> </td>
                            <td> <?php echo $item["user_login"] ?> </td>
                            <td>
                                <a href=" ./user_edit.php?id=<?php echo $item["user_no"] ?>" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <a href="../../server/users/user_delete.php?id=<?php echo $item["user_no"] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach  ?>
                </tbody>
            </table>
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