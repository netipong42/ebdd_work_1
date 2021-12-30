<?php
require_once("../../server/conn.php");

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <?php require("../component/link_header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php require("../component/manu.php") ?>
    <!-- เนื้อหา -->
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>List Customers</h1>
                <a href="./customers_form.php" class="btn btn-success my-3">Add</a>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
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
                                        <a href="./customers_edit.php?id=<?php echo $item['cust_no'] ?>" class="btn btn-warning mx-1">Edit</a>
                                        <a onClick="confirmAlert('<?php echo $item["cust_no"] ?>')" class="btn btn-danger mx-1">Delete</a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- เนื้อหา -->
    <?php require("../component/link_footer.php") ?>
    <script>
        $(function() {
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        function confirmAlert(id) {
            Swal.fire({
                icon: `warning`,
                title: `ยืนยันการลบ`,
                text: `ต้องการลบข้อมูลหรือไม่`,
                showCancelButton: true,
                cancelButtonText: `ยกเลิก`,
                cancelButtonColor: `#E74A3B`,
                confirmButtonText: `ตกลง`,
                confirmButtonColor: `#1CC88A`,
            }).then((res) => {
                if (res.isConfirmed) {
                    location.assign(`../../server/customers/customers_delete.php?id=${id}`);
                }
            })
        }
    </script>
</body>

</html>