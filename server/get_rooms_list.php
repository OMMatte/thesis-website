<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
include_once(PATH_FULL_SERVER . 'open_connection.php');

$query = "SELECT id, name, timestamp, CASE WHEN passcheck IS NULL THEN 'false' ELSE 'true' END AS locked FROM rooms";
if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];
    $statement = $database->prepare($query . " WHERE subject = :subject");
    $statement->execute(array(':subject' => $subject));
} else {
    $statement = $database->prepare($query);
    $statement->execute();
}

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
