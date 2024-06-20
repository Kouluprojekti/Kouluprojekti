<?php
$servername = "localhost";
$username = "projekti29";
$password = "29052024";
$database = "projekti29db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) die("Connection failed");
?>