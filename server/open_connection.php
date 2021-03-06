<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/constants.php");
include_once(PATH_FULL_SERVER . "functions.php");
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
