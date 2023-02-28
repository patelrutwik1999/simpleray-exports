<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'simplerayexports';

$conn = new mysqli($servername, $username, $password, $dbname);

echo "Hello";

if ($conn->connect_error) {
    die("Connection not established");
} else {
    echo "Connection Successful";
}
