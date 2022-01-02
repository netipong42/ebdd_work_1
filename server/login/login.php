<?php

require_once("../conn.php");

try {
    $data = [
        "user_login" => $_POST['user_login'],
        "user_password" => $_POST['user_password'],
    ];

    $sql = "SELECT * FROM users WHERE user_login =:user_login AND user_password = :user_password";
    $query = $conn->prepare($sql);
    $query->execute($data);
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {
        $_SESSION['user_no'] = $row["user_no"];
        $_SESSION['user_email'] = $row["user_email"];
        $_SESSION['user_name'] = $row["user_name"];
        $_SESSION['user_img'] = $row["image_data"];
        Header("Location:../../view/main/");
    } else {
        session_destroy();
        Header("Location:../../view/main/");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
