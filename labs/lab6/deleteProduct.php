<?php
if(!isset($_SESSION['adminName']))
{
   header("Location:login.php");
}

global $connection;

include 'dbConnection.php';

$connection = getDatabaseConnection();



$sql = "DELETE FROM om_product WHERE productId = " . $_GET['proudctId'];
$statement = $connection->prepare($sql);
$statement->execute();

header("Location: admin.php");

?>