<?php
require_once("../conn.php");
try {

    $dataImg = file_get_contents($_FILES["myfile"]["tmp_name"]);

    $data = [
        "user_email"    => $_POST['user_email'],
        "user_name"     => $_POST['user_name'],
        "user_login"    => $_POST['user_login'],
        "user_password" => $_POST['user_password'],
        'name'          => $_FILES['myfile']['name'],
        'type'          => $_FILES['myfile']['type'],
        'dataImg'       => $dataImg
    ];
    $sql = "INSERT INTO users 
            (user_email,
            user_name,
            user_login,
            user_password,
            image_name,
            image_type,
            image_data
            ) 
            VALUES  
            (
            :user_email,
            :user_name,
            :user_login,
            :user_password,
            :name,
            :type,
            :dataImg
            )
            ";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../../view/users/user_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
