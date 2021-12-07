<?php
require_once("../server/conn.php");

try {
    $data = ['id' => $_GET['id']];
    $slqSelect = "SELECT * FROM suppliers WHERE sub_no = :id";
    $querySelect = $conn->prepare($slqSelect);
    $querySelect->execute($data);
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
    <title>suppliers_from</title>
</head>

<body>
    <div class="boxMain">
        <h1>Edit Suppliers</h1>
        <form action="../server/suppliers_update.php" method="POST">
            <label for="sup_no" class="form-label">sup_no</label>
            <input type="text" class="form-control" name="sup_no" value="<?php echo $row['sup_no'] ?>" readonly>

            <label for="sup_company" class="form-label">sup_company</label>
            <input type="text" class="form-control" name="sup_company" value="<?php echo $row['sup_company'] ?>">

            <label for="sup_contact" class="form-label">sup_contact</label>
            <input type="number" class="form-control" name="sup_contact" value="<?php echo $row['sup_contact'] ?>">

            <label for="sup_telephone" class="form-label">sup_telephone</label>
            <input type="text" class="form-control" name="sup_telephone" value="<?php echo $row['sup_telephone'] ?>">

            <label for="sup_email" class="form-label">sup_email</label>
            <input type="number" class="form-control" name="sup_email" value="<?php echo $row['sup_email'] ?>">

            <div class="d-grid">
                <input type="submit" name="insert" value="UPDATE" class="btn btn-dark mt-3">
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>