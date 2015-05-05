<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/global_variables.php");
include_once(PATH_FULL_SERVER . 'open_connection.php');

$name = $_POST['name'];
$subject = $_POST['subject'];



if (isset($_POST['password'])) {

    $password = $_POST['password'];
    $statement = $database->prepare("INSERT INTO rooms (subject,name,passcheck) VALUES (:subject,:name,:passcheck)");
    $statement->bindParam(':passcheck', $password, PDO::PARAM_STR);

} else {
    $statement = $database->prepare("INSERT INTO rooms (subject,name) VALUES (:subject,:name)");
}

$statement->bindParam(':subject', $subject, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);

$json = array();
try {
    $execute_status = $statement->execute();
    if($execute_status){
        $id = $database->lastInsertId('id');
        $room = getRoom($id);
        $json['status'] = 'success';
        $json['room'] = $room;
    }

} catch (PDOException $e) {
    if($e->errorInfo[1] == 1062) {
        $json['status'] = 'failure';
        $json['info'] = 'Room name already exists.';
    }
}
echo json_encode($json);
//
//
//$json = array();
//if (!$execute_status) {
//    $json['status'] = 'failure';
////    $json['info'] = 'Room not found. Either wrong password or room has been removed.';
//
//} else {
//    $json['status'] = 'success';
////    $hiddenName = $results["id"] . $results['name'] . $results['subject'];
////    preg_replace("/[^A-Za-z0-9]/", '', $hiddenName);
////    $json['room'] = $results;
////    $json['room']['hiddenName'] = $hiddenName;
//}
//
//echo json_encode($json);

//
//echo "\nPDOStatement::errorInfo():\n";
//
//// configuration
//03
//$dbtype = "sqlite";
//04
//$dbhost = "localhost";
//05
//$dbname = "test";
//06
//$dbuser = "root";
//07
//$dbpass = "admin";
//08
//
//09
//// database connection
//10
//$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
//11
//
//12
//// new data
//13
//$title = 'PHP Security';
//14
//$author = 'Jack Hijack';
//15
//
//16
//// query
//17
//$sql = "INSERT INTO books (title,author) VALUES (:title,:author)";
//18
//$q = $conn->prepare($sql);
//19
//$q->execute(array(':author' => $author,
//    20
//                  ':title'=>$title));
//21
//
//22

