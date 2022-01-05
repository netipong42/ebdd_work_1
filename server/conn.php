<?php
session_start();
try {

    $host      = "localhost";
    $user      = "student";
    $pass      = "student";
    $dbname    = "mycompany";

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function checkModule($user_no, $module, $conn)
{
    try {
        $dataCheck = [
            'user_no' => $user_no,
            'module_no' => $module
        ];
        $sqlCheck = "SELECT * FROM authorize WHERE user_no=:user_no AND module_no = :module_no";
        $queryCheck = $conn->prepare($sqlCheck);
        $queryCheck->execute($dataCheck);
        if ($queryCheck->rowCount() == 0) {
            echo '<meta http-equiv="refresh" content="0;url=../main/">';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
