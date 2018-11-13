<?php
function getDatabaseConnection($dbname = 'heroku_74152a32ba521c4')
{
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    
    $username = 'bcfd1b26f774f7';
    $password = 'b9e00463';
    
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbconn;
}

?>