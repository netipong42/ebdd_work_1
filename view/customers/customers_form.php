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
                    <h1>Add customers</h1>
                </div>
                <div class="card-body">
                    <form action="../../server/customers/customers_insert.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="item_no" class="form-label">cust_no</label>
                            <input type="text" class="form-control" name="cust_no" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item_name" class="form-label">cust_name</label>
                                    <input type="text" class="form-control" name="cust_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" cust_street" class="form-label"> cust_street</label>
                                    <input type="text" class="form-control" name=" cust_street" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cust_city" class="form-label">cust_city</label>
                                    <input type="text" class="form-control" name="cust_city" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cust_state" class="form-label">cust_state</label>
                                    <input type="text" class="form-control" name="cust_state" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cust_zip" class="form-label">cust_zip</label>
                                    <input type="text" class="form-control" name="cust_zip" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ship_to_name" class="form-label">ship_to_name</label>
                                    <input type="text" class="form-control" name="ship_to_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ship_to_street" class="form-label">ship_to_street</label>
                                    <input type="text" class="form-control" name="ship_to_street" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ship_to_city" class="form-label">ship_to_city</label>
                                    <input type="text" class="form-control" name="ship_to_city" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ship_to_state" class="form-label">ship_to_state</label>
                                    <input type="text" class="form-control" name="ship_to_state" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ship_to_zip" class="form-label">ship_to_zip</label>
                                    <input type="text" class="form-control" name="ship_to_zip" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="credit_limit" class="form-label">credit_limit</label>
                                    <input type="number" class="form-control" name="credit_limit" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_revised" class="form-label">last_revised</label>
                                    <input type="date" class="form-control" name="last_revised" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="credit_terms" class="form-label">credit_terms</label>
                                    <input type="text" class="form-control" name="credit_terms" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img" class="form-label">Img</label>
                            <div class="custom-file">
                                <input type="file" onChange="PreviewImage(event)" class="custom-file-input" name="myfile" id="uploadImage" required>
                                <label class="custom-file-label" for="uploadImage">Choose file</label>
                            </div>
                        </div>
                        <div>
                            <img src="" id="uploadPreview" alt="" class="myImg">
                        </div>
                        <!-- btn -->
                        <div class=" d-grid">
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