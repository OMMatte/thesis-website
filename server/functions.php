<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
include_once(PATH_FULL_SERVER . 'open_connection.php');

function getRoom($id) {
    global $database;
    $statement = $database->prepare("SELECT * FROM rooms WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}