<?php

try {

    $host      = "localhost";
    $user      = "student";
    $pass      = "student";
    $dbname    = "mycompany";

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}



function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
