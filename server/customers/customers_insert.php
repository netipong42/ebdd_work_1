<?php
require_once("../conn.php");
try {

    $dataImg = file_get_contents($_FILES["myfile"]["tmp_name"]);

    $data = [
        "cust_no" => $_POST['cust_no'],
        "cust_name" => $_POST['cust_name'],
        "cust_street" => $_POST['cust_street'],
        "cust_city" => $_POST['cust_city'],
        "cust_state" => $_POST['cust_state'],
        "cust_zip" => $_POST['cust_zip'],
        "ship_to_name" => $_POST['ship_to_name'],
        "ship_to_street" => $_POST['ship_to_street'],
        "ship_to_city" => $_POST['ship_to_city'],
        "ship_to_state" => $_POST['ship_to_state'],
        "ship_to_zip" => $_POST['ship_to_zip'],
        "credit_limit" => $_POST['credit_limit'],
        "last_revised" => $_POST['last_revised'],
        "credit_terms" => $_POST['credit_terms'],
        'name'          => $_FILES['myfile']['name'],
        'type'          => $_FILES['myfile']['type'],
        'dataImg'       => $dataImg
    ];
    $sql = "INSERT INTO customers 
        (
        cust_no,
        cust_name,
        cust_street,
        cust_city,
        cust_state,
        cust_zip,
        ship_to_name,
        ship_to_street,
        ship_to_city,
        ship_to_state,
        ship_to_zip,
        credit_limit,
        last_revised,
        credit_terms,
        image_name,
        image_type,
        image_data
        ) 
        VALUES  
        (
        :cust_no,
        :cust_name,
        :cust_street,
        :cust_city,
        :cust_state,
        :cust_zip,
        :ship_to_name,
        :ship_to_street,
        :ship_to_city,
        :ship_to_state,
        :ship_to_zip,
        :credit_limit,
        :last_revised,
        :credit_terms,
        :name,
        :type,
        :dataImg
        ) 
    ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../../view/customers/customers_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
