<?php
require_once("../conn.php");
try {
    $data = [
        "sup_no" => $_POST['sup_no'],
        "sup_company" => $_POST['sup_company'],
        "sup_contact" => $_POST['sup_contact'],
        "sup_telephone" => $_POST['sup_telephone'],
        "sup_email"   => $_POST['sup_email'],
    ];
    $sql = "INSERT INTO suppliers 
            (
            sup_no,
            sup_company,
            sup_contact,
            sup_telephone,
            sup_email
            ) 
            VALUES  
            (
            :sup_no,
            :sup_company,
            :sup_contact,
            :sup_telephone,
            :sup_email
            )
            ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../../view/suppliers/suppliers_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
