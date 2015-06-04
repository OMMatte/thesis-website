<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/constants.php");
include_once(PATH_FULL_SERVER . 'open_connection.php');

function getRoom($id) {
    global $database;
    $statement = $database->prepare("SELECT * FROM rooms WHERE id = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

/**
 *
 * @return bool|string
 */
function getDateTime($offset_seconds) {
    return date('Y-m-d H:i:s', time() + $offset_seconds);
}