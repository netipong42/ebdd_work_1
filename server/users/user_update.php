<?php
require_once("../conn.php");
try {
    if ($_FILES["myfile"]["name"] <> "") {
        $dataImg = file_get_contents($_FILES["myfile"]["tmp_name"]);
        $data = [
            "id"            => $_POST['id'],
            "user_email"    => $_POST['user_email'],
            "user_name"     => $_POST['user_name'],
            "user_login"    => $_POST['user_login'],
            "user_password" => $_POST['user_password'],
            'name'          => $_FILES['myfile']['name'],
            'type'          => $_FILES['myfile']['type'],
            'dataImg'       => $dataImg
        ];
        $sql = "UPDATE users SET
        user_email = :user_email,
        user_name = :user_name,
        user_login = :user_login,
        user_password = :user_password,
        image_name = :name,
        image_type = :type,
        image_data = :dataImg
        WHERE user_no = :id
        ";
        $query = $conn->prepare($sql);
        $query->execute($data);
    } else {
        $data = [
            "id"            => $_POST['id'],
            "user_email"    => $_POST['user_email'],
            "user_name"     => $_POST['user_name'],
            "user_login"    => $_POST['user_login'],
            "user_password" => $_POST['user_password'],
        ];
        $sql = "UPDATE users SET
        user_email = :user_email,
        user_name = :user_name,
        user_login = :user_login,
        user_password = :user_password
        WHERE user_no = :id
        ";
        $query = $conn->prepare($sql);
        $query->execute($data);
    }
    if ($query) {
        Header("Location:../../view/users/user_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
