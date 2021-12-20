<?php
require_once("../server/conn.php");

try {
    $data = [
        'id' => $_GET["id"]
    ];
    $sql = "SELECT * FROM inventory WHERE item_no = :id";
    $query = $conn->prepare($sql);
    $query->execute($data);
    $row = $query->fetch(PDO::FETCH_ASSOC);

    $sqlSup = "SELECT * FROM suppliers";
    $querySup = $conn->prepare($sqlSup);
    $querySup->execute();
    $rowSup = $querySup->fetchAll(PDO::FETCH_ASSOC);
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
    <title>inventory_from</title>
</head>

<body>
    <div class="boxMain">
        <h1>Edit Inventory</h1>
        <form action="../server/inventory_update.php" method="POST" enctype="multipart/form-data">
            <!-- Item no -->
            <label for="item_no" class="form-label">Item no</label>
            <input type="text" class="form-control" name="item_no" value="<?php echo $row['item_no'] ?>">

            <!-- Item name -->
            <label for="item_name" class="form-label">Item name</label>
            <input type="text" class="form-control" name="item_name" value="<?php echo $row['item_name'] ?>">

            <!-- Price -->
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="<?php echo $row['price'] ?>">

            <!-- Location -->
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" value="<?php echo $row['location'] ?>">

            <!-- Item name -->
            <label for="qty_on_hand" class="form-label">Quantity on hand</label>
            <input type="number" class="form-control" name="qty_on_hand" value="<?php echo $row['qty_on_hand'] ?>">

            <!-- Item name -->
            <label for="reorder_pt" class="form-label">Reorder Point</label>
            <input type="number" class="form-control" name="reorder_pt" value="<?php echo $row['reorder_pt'] ?>">

            <label for="sup_no" class="form-label">sup_no</label>
            <select name="sup_no" id="sup_no" class="form-control">
                <?php foreach ($rowSup as $item) : ?>
                    <option value="<?php echo $item["sup_no"] ?>" <?php echo $row['sup_no'] == $item['sup_no'] ? "selected" : "" ?>> <?php echo $item["sup_company"] ?></option>
                <?php endforeach  ?>
            </select>

            <!-- img -->
            <label for="img" class="form-label">Img</label>
            <input type="file" onChange="PreviewImage(event)" class="form-control" name="myfile" id="uploadImage">
            <div>
                <img src="data<?php echo ":" . $row['image_type'] ?>;base64,<?php echo base64_encode($row['image_data']) ?>" alt="" id="uploadPreview" class="myImg">
            </div>
            <!-- id -->
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['item_no'] ?>">
            <!-- btn -->
            <div class="d-grid">
                <input type="submit" name="save" value="SAVE" class="btn btn-dark mt-3">
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
    </script>
</body>

</html>