<?php
require_once("./conn.php");
try {
    $data = [
        "id"            => $_POST['id'],
        "item_no"       => $_POST['item_no'],
        "item_name"     => $_POST['item_name'],
        "price"         => $_POST['price'],
        "location"      => $_POST['location'],
        "qty_on_hand"   => $_POST['qty_on_hand'],
        "reorder_pt"    => $_POST['reorder_pt'],
    ];
    $sql = "UPDATE inventory SET
        item_no = :item_no,
        item_name = :item_name,
        price = :price,
        location = :location,
        qty_on_hand = :qty_on_hand,
        reorder_pt = :reorder_pt
        WHERE item_no = :id
    ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../view/inventory_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
