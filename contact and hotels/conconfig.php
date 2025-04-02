<?php

$con = new mysqli("localhost", "root", "", "ceylon_journey");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

?>
