<?php
require_once("./conn.php");
try {
    $data = [
        "item_no"       => $_POST['item_no'],
        "item_name"     => $_POST['item_name'],
        "price"         => $_POST['price'],
        "location"      => $_POST['location'],
        "qty_on_hand"   => $_POST['qty_on_hand'],
        "reorder_pt"    => $_POST['reorder_pt'],
    ];
    $sql = "INSERT INTO inventory 
    (item_no,item_name,price,location,qty_on_hand,reorder_pt) 
    VALUES  
    (:item_no,:item_name,:price,:location,:qty_on_hand,:reorder_pt)
    ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../view/inventory_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
