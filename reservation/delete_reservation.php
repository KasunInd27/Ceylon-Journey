<?php
$con = new mysqli("localhost", "root", "", "ceylon_journey");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM reservations WHERE id = $id";
    
    if ($con->query($query)) {
        echo "Reservation deleted successfully.";
        header("Location: view_reservations.php");
    } else {
        echo "Error deleting reservation: " . $con->error;
    }
}

$con->close();
?>
