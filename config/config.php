<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'simplerayexports';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    // mysql: //b8db078d719f48:735c7f9e@us-cdbr-east-06.cleardb.net/heroku_4cf325fd1228099?reconnect=true
    $db_host = "us-cdbr-east-06.cleardb.net";
    $db_user = "b8db078d719f48";
    $db_pass = "735c7f9e";
    $db_name = "heroku_4cf325fd1228099";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Connection not established");
}
