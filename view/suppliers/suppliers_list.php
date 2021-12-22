<?php
require_once("../../server/conn.php");

try {
    $slqSelect = "SELECT * FROM suppliers";
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
                <h1>List Suppliers</h1>
                <a href="./suppliers_form.php" class="btn btn-success my-3">Add</a>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>sup_no</th>
                            <th>sup_company</th>
                            <th>sup_contact</th>
                            <th>sup_telephone</th>
                            <th>sup_email</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $item) :  ?>
                            <tr>
                                <td> <?php echo $item["sup_no"] ?> </td>
                                <td> <?php echo $item["sup_company"] ?> </td>
                                <td> <?php echo $item["sup_contact"] ?> </td>
                                <td> <?php echo $item["sup_telephone"] ?> </td>
                                <td> <?php echo $item["sup_email"] ?> </td>
                                <td>
                                    <a href="./suppliers_edit.php?id=<?php echo $item["sup_no"] ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <a href="../../server/suppliers_delete.php?id=<?php echo $item["sup_no"] ?>" class="btn btn-danger">Delete</a>
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