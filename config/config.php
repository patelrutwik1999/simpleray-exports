<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'simplerayexports';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection not established");
}
