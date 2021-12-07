<?php
require_once("../server/conn.php");

try {
    $slqSelect = "SELECT * FROM inventory";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Mystyle -->
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>inventory_list</title>
</head>

<body>
    <div class="boxMain">
        <h1>List Inventory</h1>
        <a href="./inventory_form.php" class="btn btn-dark my-3">Add</a>
        <table class="table table-bordered">
            <thead>
                <tr>
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
                        <td> <?php echo $item["item_no"] ?> </td>
                        <td> <?php echo $item["item_name"] ?> </td>
                        <td> <?php echo $item["price"] ?> </td>
                        <td> <?php echo $item["location"] ?> </td>
                        <td> <?php echo $item["qty_on_hand"] ?> </td>
                        <td> <?php echo $item["reorder_pt"] ?> </td>
                        <td> <?php echo $item["sup_no"] ?> </td>
                        <td>
                            <a href="./inventory_edit.php?id=<?php echo $item["item_no"] ?>" class="btn btn-dark">Edit</a>
                        </td>
                        <td>
                            <a href="../server/inventory_delete.php?id=<?php echo $item["item_no"] ?>" class="btn btn-dark">Delete</a>
                        </td>
                    </tr>
                <?php endforeach  ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>