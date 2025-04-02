<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="read.css">
</head>
<body>
<?php
require 'config.php';

$sql = "SELECT reviewId, email, reviewType, rating, descrip, date FROM reviews";
$result = $con->query($sql);

echo '<html>';
echo '<head>';
echo '<style>';

echo '</style>';
echo '</head>';
echo '<body>';

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Review ID</th>
                <th>Email</th>
                <th>Review Type</th>
                <th>Rating</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["reviewId"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["reviewType"] . "</td>";
        echo "<td>" . $row["rating"] . "</td>";
        echo "<td>" . $row["descrip"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";

        echo "<td><a href='upindex.php?id=" . $row['reviewId'] . "'>Update</a></td>";

                echo "<td><a href='delindex.php?id=" . $row['reviewId'] . "' onclick='return confirm(\"Are you sure you want to delete this entry?\")'>Delete</a></td>";                          
                echo "</tr>";
       
    }
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}

$con->close();
echo '</body>';
echo '</html>';
?>
</body>
</html>