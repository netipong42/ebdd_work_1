<?php
require_once("../../server/conn.php");

$sql = " SELECT * FROM suppliers";
$query = $conn->prepare($sql);
$query->execute();
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
            <div class="card card-success">
                <div class="card-header">
                    <h1>Add Inventory</h1>
                </div>
                <div class="card-body">
                    <form action="../../server/inventory_insert.php" method="POST" enctype="multipart/form-data">
                        <!-- Item no -->
                        <label for="item_no" class="form-label">Item no</label>
                        <input type="text" class="form-control" name="item_no">

                        <!-- Item name -->
                        <label for="item_name" class="form-label">Item name</label>
                        <input type="text" class="form-control" name="item_name">

                        <!-- Price -->
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price">

                        <!-- Location -->
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location">

                        <!-- Item name -->
                        <label for="qty_on_hand" class="form-label">Quantity on hand</label>
                        <input type="number" class="form-control" name="qty_on_hand">

                        <!-- Item name -->
                        <label for="reorder_pt" class="form-label">Reorder Point</label>
                        <input type="number" class="form-control" name="reorder_pt">

                        <label for="sup_no" class="form-label">sup_no</label>
                        <select name="sup_no" id="sup_no" class="form-control">
                            <?php foreach ($row as $item) : ?>
                                <option value="<?php echo $item["sup_no"] ?>"> <?php echo $item["sup_company"] ?></option>
                            <?php endforeach  ?>
                        </select>

                        <!-- img -->
                        <label for="img" class="form-label">Img</label>
                        <div class="custom-file">
                            <input type="file" onChange="PreviewImage(event)" class="custom-file-input" name="myfile" id="uploadImage">
                            <label class="custom-file-label" for="uploadImage">Choose file</label>
                        </div>
                        <div>
                            <img src="" id="uploadPreview" alt="" class="myImg">
                        </div>
                        <!-- btn -->
                        <div class="d-grid">
                            <input type="submit" name="insert" value="INSERT" class="btn btn-dark btn-block mt-3">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
    <script>
        // preview
        // function PreviewImage(event) {
        //     var output = document.getElementById('uploadPreview');
        //     output.src = URL.createObjectURL(event.target.files[0]);
        // };

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