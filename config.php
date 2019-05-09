<?php
$hostName = 'mini.cehmkpxgnmwk.us-east-2.rds.amazonaws.com';
$userName = 'root';
$password = 'rohit1998';
$databaseName = 'root';

$mysqli = new mysqli($hostName, $userName, $password, $databaseName);

if ($mysqli->connect_error){
    echo "Connection Error....<br>";
}
else{
    echo "";
}
?>