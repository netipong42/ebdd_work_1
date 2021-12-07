<?php
require_once("./conn.php");
try {
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
    ];
    $sql = "UPDATE customers SET
            cust_name = :cust_name,
            cust_street = :cust_street,
            cust_city = :cust_city,
            cust_state = :cust_state,
            cust_zip = :cust_zip,
            ship_to_name = :ship_to_name,
            ship_to_street = :ship_to_street,
            ship_to_city = :ship_to_city,
            ship_to_state = :ship_to_state,
            ship_to_zip = :ship_to_zip,
            credit_limit = :credit_limit,
            last_revised = :last_revised,
            credit_terms = :credit_terms
            WHERE cust_no = :cust_no
            ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../view/customers_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
