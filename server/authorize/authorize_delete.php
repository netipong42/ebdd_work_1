<?php

require_once("../conn.php");

try {
    $data = [
        "id" => $_GET['id'],
        "module" => $_GET['module'],
    ];
    show($data);
    $sql = "DELETE FROM authorize WHERE user_no = :id AND module_no = :module";
    $query = $conn->prepare($sql);
    $query->execute($data);

    if ($query) {
        Header("Location:../../view/authorize/authorize_list.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
