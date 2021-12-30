<?php
require_once("../../server/conn.php");

try {
    $data = [
        'id' => $_GET["id"]
    ];
    $sql = "SELECT * FROM users WHERE user_no = :id";
    $query = $conn->prepare($sql);
    $query->execute($data);
    $row = $query->fetch(PDO::FETCH_ASSOC);
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
    <div class="card card-success">
        <div class="card-header">
            <h1>User Form</h1>
        </div>
        <div class="card-body">
            <form action="../../server/users/user_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="id" value="<?php echo $row["user_no"] ?>" required>
                <!-- user_email -->
                <div class="form-group">
                    <label for="user_email" class="form-label">user_email</label>
                    <input type="email" class="form-control" name="user_email" value="<?php echo $row["user_email"] ?>" required>
                </div>
                <!-- user_email -->

                <!-- user_name -->
                <div class="form-group">
                    <label for="user_name" class="form-label">user_name</label>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $row["user_name"] ?>" required>
                </div>
                <!-- user_name -->

                <!-- user_login -->
                <div class="form-group">
                    <label for="user_login" class="form-label">user_login</label>
                    <input type="text" class="form-control" name="user_login" value="<?php echo $row["user_login"] ?>" required>
                </div>
                <!-- user_login -->

                <!-- user_password -->
                <div class="form-group">
                    <label for="user_password" class="form-label">user_password</label>
                    <input type="text" class="form-control" name="user_password" value="<?php echo $row["user_password"] ?> " required>
                </div>
                <!-- user_password -->

                <!-- img -->
                <div class="form-group">
                    <label for="img" class="form-label">Img</label>
                    <div class="custom-file">
                        <input type="file" onChange="PreviewImage(event)" class="custom-file-input" name="myfile" id="uploadImage">
                        <label class="custom-file-label" for="uploadImage">Choose file</label>
                    </div>
                    <div>
                        <img src="data<?php echo ":" . $row['image_type'] ?>;base64,<?php echo base64_encode($row['image_data']) ?>" id="uploadPreview" alt="" class="myImg">
                    </div>
                </div>
                <!-- img -->


                <!-- btn -->
                <div class="form-group">
                    <input type="submit" name="insert" value="INSERT" class="btn btn-dark btn-block mt-3">
                </div>
                <!-- btn -->
            </form>
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
    </script>
</body>

</html>