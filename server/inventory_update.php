<?php
require_once("./conn.php");
try {
    if ($_FILES["myfile"]["name"] <> "") {
        $dataImg = file_get_contents($_FILES["myfile"]["tmp_name"]);
        $data = [
            "id"            => $_POST['id'],
            "item_no"       => $_POST['item_no'],
            "item_name"     => $_POST['item_name'],
            "price"         => $_POST['price'],
            "location"      => $_POST['location'],
            "qty_on_hand"   => $_POST['qty_on_hand'],
            "reorder_pt"    => $_POST['reorder_pt'],
            "sup_no"    => $_POST['sup_no'],
            'name'          => $_FILES['myfile']['name'],
            'type'          => $_FILES['myfile']['type'],
            'dataImg'       => $dataImg
        ];
        $sql = "UPDATE inventory SET
        item_no = :item_no,
        item_name = :item_name,
        price = :price,
        location = :location,
        qty_on_hand = :qty_on_hand,
        reorder_pt = :reorder_pt,
        sup_no = :sup_no,
        image_name = :name,
        image_type = :type,
        image_data = :dataImg
        WHERE item_no = :id
        ";
        $query = $conn->prepare($sql);
        $query->execute($data);
    } else {
        $data = [
            "id"            => $_POST['id'],
            "item_no"       => $_POST['item_no'],
            "item_name"     => $_POST['item_name'],
            "price"         => $_POST['price'],
            "location"      => $_POST['location'],
            "qty_on_hand"   => $_POST['qty_on_hand'],
            "reorder_pt"    => $_POST['reorder_pt'],
            "sup_no"    => $_POST['sup_no'],

        ];
        $sql = "UPDATE inventory SET
        item_no = :item_no,
        item_name = :item_name,
        price = :price,
        location = :location,
        qty_on_hand = :qty_on_hand,
        reorder_pt = :reorder_pt,
        sup_no = :sup_no
        WHERE item_no = :id
        ";
        $query = $conn->prepare($sql);
        $query->execute($data);
    }
    if ($query) {
        Header("Location:../view/inventory/inventory_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
