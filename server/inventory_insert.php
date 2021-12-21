<?php
require_once("./conn.php");
try {

    $dataImg = file_get_contents($_FILES["myfile"]["tmp_name"]);

    $data = [
        "item_no"       => $_POST['item_no'],
        "item_name"     => $_POST['item_name'],
        "price"         => $_POST['price'],
        "location"      => $_POST['location'],
        "qty_on_hand"   => $_POST['qty_on_hand'],
        "reorder_pt"    => $_POST['reorder_pt'],
        "sup_no"        => $_POST['sup_no'],
        'name'          => $_FILES['myfile']['name'],
        'type'          => $_FILES['myfile']['type'],
        'dataImg'       => $dataImg
    ];
    $sql = "INSERT INTO inventory 
            (item_no,
            item_name,
            price,
            location,
            qty_on_hand,
            reorder_pt,
            sup_no,
            image_name,
            image_type,
            image_data
            ) 
            VALUES  
            (
            :item_no,
            :item_name,
            :price,
            :location,
            :qty_on_hand,
            :reorder_pt,
            :sup_no,
            :name,
            :type,
            :dataImg
            )
            ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../view/inventory/inventory_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
