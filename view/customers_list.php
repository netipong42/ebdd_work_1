<?php
require_once("../server/conn.php");

try {
    $slqSelect = "SELECT * FROM customers";
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
    <title>customers_list</title>
</head>

<body>
    <h1>List customers</h1>
    <a href="./customers_form.php" class="btn btn-dark my-3">Add</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>image</th>
                    <th>cust_no</th>
                    <th>cust_name</th>
                    <th>cust_street</th>
                    <th>cust_city</th>
                    <th>cust_state</th>
                    <th>cust_zip</th>
                    <th>ship_to_name</th>
                    <th>ship_to_street</th>
                    <th>ship_to_city</th>
                    <th>ship_to_state</th>
                    <th>ship_to_zip</th>
                    <th>credit_limit</th>
                    <th>last_revised</th>
                    <th>credit_terms</th>
                    <th class="text-center">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $item) :  ?>
                    <tr>
                        <td>
                            <img src="<?php echo "data:" . $item["image_type"] . ";base64," . base64_encode($item["image_data"]) ?>" class="myImgList">
                        </td>
                        <td> <?php echo $item["cust_no"] ?> </td>
                        <td> <?php echo $item["cust_name"] ?> </td>
                        <td> <?php echo $item["cust_street"] ?> </td>
                        <td> <?php echo $item["cust_city"] ?> </td>
                        <td> <?php echo $item["cust_state"] ?> </td>
                        <td> <?php echo $item["cust_zip"] ?> </td>
                        <td> <?php echo $item["ship_to_name"] ?> </td>
                        <td> <?php echo $item["ship_to_street"] ?> </td>
                        <td> <?php echo $item["ship_to_city"] ?> </td>
                        <td> <?php echo $item["ship_to_state"] ?> </td>
                        <td> <?php echo $item["ship_to_zip"] ?> </td>
                        <td> <?php echo $item["credit_limit"] ?> </td>
                        <td> <?php echo $item["last_revised"] ?> </td>
                        <td> <?php echo $item["credit_terms"] ?> </td>
                        <td>
                            <div class="d-flex">
                                <a href="./customers_edit.php?id=<?php echo $item['cust_no'] ?>" class="btn btn-dark mx-1">Edit</a>
                                <a href="../server/customers_delete.php?id=<?php echo $item['cust_no'] ?>" class="btn btn-dark mx-1">Delete</a>
                            </div>
                        </td>

                    </tr>
                <?php endforeach  ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>