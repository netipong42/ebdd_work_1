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
        "sup_no"        => $_POST['sup_no'],
    ];
    $sql = "INSERT INTO inventory 
            (item_no,
            item_name,
            price,
            location,
            qty_on_hand,
            reorder_pt,
            sup_no
            ) 
            VALUES  
            (
                :item_no,
            :item_name,
            :price,
            :location,
            :qty_on_hand,
            :reorder_pt,
            :sup_no
            )
            ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../view/inventory_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
