<?php

$host = "localhost";
$username = "root";
$password = "ibrahimben1133.";
$database = "address_book";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

