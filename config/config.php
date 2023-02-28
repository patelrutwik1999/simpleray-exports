<?php
$servername = "localhost";
$username = 'root';
$password = 'root';
$database_name = 'simpleray-exports';

$conn = new mysqli($servername, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection Failed!!" . $conn->connect_error);
} else {
    echo "Successful";
}
