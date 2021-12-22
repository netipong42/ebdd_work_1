<?php
require_once("./conn.php");


try {
    $data = ['id' => $_GET['id']];
    $sql = "DELETE FROM customers WHERE cust_no = :id";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../view/customers/customers_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
