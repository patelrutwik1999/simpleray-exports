<?php
$db_host = "us-cdbr-east-06.cleardb.net";
$db_user = "b8db078d719f48";
$db_pass = "735c7f9e";
$db_name = "heroku_4cf325fd1228099";
echo "hi";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Connection not established");
echo "hello";
