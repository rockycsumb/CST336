<?php

include '../dbConnection.php';
$dbconn = getDatabaseConnection("heroku_74152a32ba521c4");

$sql = "SELECT *, YEAR(CURDATE()) - yob age
        FROM pets
        WHERE id = :id";
$stmt = $dbconn->prepare($sql);
$stmt->execute(array("id"=>$_GET['id']));
$resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultSet);

?>