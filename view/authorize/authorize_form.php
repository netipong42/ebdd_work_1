<?php
require_once("../../server/conn.php");

$sqlUser = "SELECT * FROM users";
$queryUser = $conn->prepare($sqlUser);
$queryUser->execute();
$rowUser  = $queryUser->fetchAll(PDO::FETCH_ASSOC);

$dir = "../";
$notFolder = ["..", ".", "component", "main"];
$folder = scandir($dir);
$newFolder = array_diff($folder, $notFolder);
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
                    <h1> Authorize</h1>
                </div>
                <div class="card-body">
                    <form action="../../server/authorize/authorize_insert.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user" class="form-label">User</label>
                                    <select name="user_no" id="user" class="form-control" required>
                                        <option value="">
                                            ---select user---
                                        </option>
                                        <?php foreach ($rowUser as $item) :  ?>
                                            <option value="<?php echo $item["user_no"] ?>">
                                                <?php echo $item['user_name']  ?>
                                            </option>
                                        <?php endforeach  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="path" class="form-label">Path</label>
                                    <select name="module_no" id="path" class="form-control" required>
                                        <option value="">
                                            ---select path---
                                        </option>
                                        <?php foreach ($newFolder as $item) :   ?>
                                            <option value="<?php echo $item ?>"> <?php echo $item ?></option>
                                        <?php endforeach  ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="insert" class="btn btn-dark btn-block">
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