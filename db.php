<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "busbook";

$con = mysqli_connect($host, $user, $pass, $dbname);

if (!$con) {
    die("Connection Error");
}
?>
