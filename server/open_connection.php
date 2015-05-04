<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
try {
    $database = new PDO('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DATABASE, MYSQL_USERNAME, MYSQL_PASSWORD);
    // set the PDO error mode to exception
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Successful connect
}
catch(PDOException $e)
{
    die('Could not connect to database: ' . $e->getMessage());
}
