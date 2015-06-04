<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/constants.php");
include_once(PATH_FULL_SERVER . 'open_connection.php');
include_once(PATH_FULL_SERVER . 'functions.php');

define('NEW_ROOM_TIME_LIMIT', 60*60*5); // 60*60*5 = 5 hours

$name = $_POST['name'];
$subject = $_POST['subject'];

$json = array();
if(!preg_match('/' . ROOM_CREATION_REGEX . '/', $name)) {
    $json['status'] = 'failure';
    $json['info'] = 'Strange room regex';
}else {
    if (isset($_POST['password'])) {

        $password = $_POST['password'];
        $statement = $database->prepare("INSERT INTO rooms (subject,name,passcheck,closing_time) VALUES (:subject,:name,:passcheck,:closing_time)");
        $statement->bindParam(':passcheck', $password, PDO::PARAM_STR);

    } else {
        $statement = $database->prepare("INSERT INTO rooms (subject,name,closing_time) VALUES (:subject,:name,:closing_time)");
    }

    $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);

    $date = getDateTime(NEW_ROOM_TIME_LIMIT);
    $statement->bindParam(':closing_time', $date, PDO::PARAM_STR);


    try {
        $execute_status = $statement->execute();
        if ($execute_status) {
            $id = $database->lastInsertId('id');
            $room = getRoom($id);
            $json['status'] = 'success';
            $json['room'] = $room;
        }

    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $json['status'] = 'failure';
            $json['info'] = 'Room name already exists.';
        }
    }
}
echo json_encode($json);