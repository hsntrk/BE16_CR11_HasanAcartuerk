<?php
$hostName = "127.0.0.1";
$userName = "root";
$password = "";
$dbName = "be16_cr11_animal_adoption_hasanacartuerk";


$connect = mysqli_connect($hostName, $userName, $password, $dbName);

if (!$connect) {
    echo "error";
    exit;
};