<?php
require_once("../server/conn.php");
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
    <title>suppliers_from</title>
</head>

<body>
    <div class="boxMain">
        <h1>Add Suppliers</h1>
        <form action="../server/suppliers_insert.php" method="POST">
            <label for="sup_no" class="form-label">sup_no</label>
            <input type="text" class="form-control" name="sup_no">

            <label for="sup_company" class="form-label">sup_company</label>
            <input type="text" class="form-control" name="sup_company">

            <label for="sup_contact" class="form-label">sup_contact</label>
            <input type="number" class="form-control" name="sup_contact">

            <label for="sup_telephone" class="form-label">sup_telephone</label>
            <input type="text" class="form-control" name="sup_telephone">

            <label for="sup_email" class="form-label">sup_email</label>
            <input type="number" class="form-control" name="sup_email">

            <div class="d-grid">
                <input type="submit" name="insert" value="INSERT" class="btn btn-dark mt-3">
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>