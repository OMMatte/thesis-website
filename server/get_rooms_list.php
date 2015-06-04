<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/constants.php");
include_once(PATH_FULL_SERVER . 'open_connection.php');

$query = "SELECT id, name, closing_time, CASE WHEN passcheck IS NULL THEN 'false' ELSE 'true' END AS locked FROM rooms WHERE (closing_time IS NULL OR closing_time > :current_time)";
$date_time = getDateTime(0);
$array = array();
$array[':current_time'] = $date_time;
if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];
    $query = $query . " AND subject = :subject";
    $array[':subject'] = $subject;
}

$statement = $database->prepare($query);
$statement->execute($array);

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
