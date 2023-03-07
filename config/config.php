<?php
$db_host = "us-cdbr-east-06.cleardb.net";
$db_user = "b8db078d719f48";
$db_pass = "735c7f9e";
$db_name = "heroku_4cf325fd1228099";
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    // mysql: //b8db078d719f48:735c7f9e@us-cdbr-east-06.cleardb.net/heroku_4cf325fd1228099?reconnect=true
    echo "Connection not established";
} else {
    echo "Connection successful";
}
