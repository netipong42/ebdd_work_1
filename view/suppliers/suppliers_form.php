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
                    <h1>Add Suppliers</h1>
                </div>
                <div class="card-body">
                    <form action="../../server/suppliers/suppliers_insert.php" method="POST">
                        <label for="sup_no" class="form-label">sup_no</label>
                        <input type="text" class="form-control" name="sup_no" required>

                        <label for="sup_company" class="form-label">sup_company</label>
                        <input type="text" class="form-control" name="sup_company" required>

                        <label for="sup_contact" class="form-label">sup_contact</label>
                        <input type="number" class="form-control" name="sup_contact" required>

                        <label for="sup_telephone" class="form-label">sup_telephone</label>
                        <input type="text" class="form-control" name="sup_telephone" required>

                        <label for="sup_email" class="form-label">sup_email</label>
                        <input type="number" class="form-control" name="sup_email" required>

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
</body>

</html>