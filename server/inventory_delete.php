<?php

require_once("./conn.php");

try {
    $data = [
        "id" => $_GET['id']
    ];
    $sql = "DELETE FROM inventory WHERE item_no = :id";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../view/inventory_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
