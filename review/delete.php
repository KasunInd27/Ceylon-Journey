<?php
require 'config.php';


$reviewId = $_POST["reviewId"];     


$sql = "DELETE FROM reviews WHERE reviewId = '$reviewId'";


if ($con->query($sql) === TRUE) {
    echo "<script>
    alert('Update succsess');
    window.location.href = 'read.php';
</script>";
} else {
    echo "Error deleting review: " . $con->error;
}


$con->close();
?>

