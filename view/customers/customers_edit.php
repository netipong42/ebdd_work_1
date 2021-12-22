<?php
require_once("../../server/conn.php");
$data = [
    'id' => $_GET['id']
];
$sql = "SELECT * FROM customers WHERE cust_no = :id";
$query = $conn->prepare($sql);
$query->execute($data);
$row = $query->fetch(PDO::FETCH_ASSOC);
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
                    <h1>Edit Customers</h1>
                </div>
                <div class="card-body">

                    <form action="../../server/customers_update.php" method="POST" enctype="multipart/form-data">
                        <!-- cust_no -->
                        <label for="item_no" class="form-label">cust_no</label>
                        <input type="text" class="form-control" name="cust_no" value="<?php echo $row['cust_no'] ?>" readonly>

                        <!-- cust_name -->
                        <label for="item_name" class="form-label">cust_name</label>
                        <input type="text" class="form-control" name="cust_name" value="<?php echo $row['cust_name'] ?>">

                        <!--  cust_street -->
                        <label for=" cust_street" class="form-label"> cust_street</label>
                        <input type="text" class="form-control" name=" cust_street" value="<?php echo $row['cust_street'] ?>">

                        <!-- cust_city -->
                        <label for="cust_city" class="form-label">cust_city</label>
                        <input type="text" class="form-control" name="cust_city" value="<?php echo $row['cust_city'] ?>">

                        <!-- cust_state -->
                        <label for="cust_state" class="form-label">cust_state</label>
                        <input type="text" class="form-control" name="cust_state" value="<?php echo $row['cust_state'] ?>">

                        <!-- cust_zip -->
                        <label for="cust_zip" class="form-label">cust_zip</label>
                        <input type="text" class="form-control" name="cust_zip" value="<?php echo $row['cust_zip'] ?>">

                        <!-- ship_to_name -->
                        <label for="ship_to_name" class="form-label">ship_to_name</label>
                        <input type="text" class="form-control" name="ship_to_name" value="<?php echo $row['ship_to_name'] ?>">

                        <!-- ship_to_street -->
                        <label for="ship_to_street" class="form-label">ship_to_street</label>
                        <input type="text" class="form-control" name="ship_to_street" value="<?php echo $row['ship_to_street'] ?>">

                        <!-- ship_to_city -->
                        <label for="ship_to_city" class="form-label">ship_to_city</label>
                        <input type="text" class="form-control" name="ship_to_city" value="<?php echo $row['ship_to_city'] ?>">

                        <!-- ship_to_state -->
                        <label for="ship_to_state" class="form-label">ship_to_state</label>
                        <input type="text" class="form-control" name="ship_to_state" value="<?php echo $row['ship_to_state'] ?>">

                        <!-- ship_to_zip -->
                        <label for="ship_to_zip" class="form-label">ship_to_zip</label>
                        <input type="text" class="form-control" name="ship_to_zip" value="<?php echo $row['ship_to_zip'] ?>">

                        <!-- credit_limit -->
                        <label for="credit_limit" class="form-label">credit_limit</label>
                        <input type="number" class="form-control" name="credit_limit" value="<?php echo $row['credit_limit'] ?>">

                        <!-- last_revised -->
                        <label for="last_revised" class="form-label">last_revised</label>
                        <input type="date" class="form-control" name="last_revised" value="<?php echo $row['last_revised'] ?>">

                        <!-- credit_terms -->
                        <label for="credit_terms" class="form-label">credit_terms</label>
                        <input type="text" class="form-control" name="credit_terms" value="<?php echo $row['credit_terms'] ?>">

                        <!-- img -->
                        <label for="img" class="form-label">Img</label>
                        <div class="custom-file">
                            <input type="file" onChange="PreviewImage(event)" class="custom-file-input" name="myfile" id="uploadImage">
                            <label class="custom-file-label" for="uploadImage">Choose file</label>
                        </div>
                        <div>
                            <img src="<?php echo "data:" . $row["image_type"] . ";base64," . base64_encode($row["image_data"]) ?>" id="uploadPreview" alt="" class="myImg">
                        </div>
                        <!-- btn -->
                        <div class="d-grid">
                            <input type="submit" name="update" value="UPDATE" class="btn btn-dark btn-block mt-3">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById('uploadImage').files[0]);
            oFReader.onload = function(oFREvent) {
                var output = document.getElementById('uploadPreview');
                output.src = oFREvent.target.result
            }
        }
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>