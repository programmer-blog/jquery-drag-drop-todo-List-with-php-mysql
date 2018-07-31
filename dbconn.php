<?php

$host       = "localhost";

$username   = "root";

$password   = "";

$dbname     = "test";

$conn       = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection to database failed: " .$conn->connect_error);
}