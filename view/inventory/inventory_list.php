<?php
require_once("../../server/conn.php");

try {
    $slqSelect = "SELECT * FROM inventory as i
		 LEFT JOIN suppliers as p
		 ON i.sup_no = p.sup_no
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
    <div class="card">
        <div class="card-header">
            <h1>List Inventory</h1>
            <a href="./inventory_form.php" class="btn btn-success my-3">Add</a>
        </div>

        <div class="card-body">
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>image</th>
                        <th>item_no </th>
                        <th>item_name</th>
                        <th>price</th>
                        <th>location</th>
                        <th>qty_on_hand</th>
                        <th>reorder_pt</th>
                        <th>sup_no</th>
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
                            <td> <?php echo $item["item_no"] ?> </td>
                            <td> <?php echo $item["item_name"] ?> </td>
                            <td> <?php echo $item["price"] ?> </td>
                            <td> <?php echo $item["location"] ?> </td>
                            <td> <?php echo $item["qty_on_hand"] ?> </td>
                            <td> <?php echo $item["reorder_pt"] ?> </td>
                            <td> <?php echo $item["sup_company"] ?> </td>
                            <td>
                                <a href=" ./inventory_edit.php?id=<?php echo $item["item_no"] ?>" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <a href="../../server/inventory_delete.php?id=<?php echo $item["item_no"] ?>" class="btn btn-danger">Delete</a>
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