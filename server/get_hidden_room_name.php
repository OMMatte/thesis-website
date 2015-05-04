<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
include_once(PATH_FULL_SERVER . 'open_connection.php');

$id = $_POST['id'];

if(isset($_POST['password'])) {
    $password = $_POST['password'];
    $statement = $database->prepare("SELECT id, name, subject FROM rooms WHERE id = :id AND passcheck = :passcheck");
    $statement->bindValue(':passcheck', $password, PDO::PARAM_STR);

} else {
    $statement = $database->prepare("SELECT id, name, subject FROM rooms WHERE id = :id AND passcheck IS NULL");

}
$statement->bindParam(':id', $id, PDO::PARAM_STR);
$statement->execute();
$results = $statement->fetch(PDO::FETCH_ASSOC);

$json = array();
if ($results === false) {
    $json['status'] = 'failure';
    $json['info'] = 'Room not found. Either wrong password or room has been removed.';

} else {
    $json['status'] = 'success';
    $hiddenName = $results["id"] . $results['name'] . $results['subject'];
    preg_replace("/[^A-Za-z0-9]/", '', $hiddenName);
    $json['hiddenName'] = $hiddenName;
}

echo json_encode($json);


