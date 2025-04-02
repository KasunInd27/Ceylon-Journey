<?php
    include("conconfig.php");  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>

    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            background: #fff;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ffa500;
            color: #fff;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .delete-btn, .edit-btn {
            padding: 8px 12px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #4CAF50;
        }
        .delete-btn:hover {
            background-color: #ff1a1a;
        }
        .edit-btn:hover {
            background-color: #45a049;
        }
        .form-container {
            display: none; 
            margin-top: 20px;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Contact Messages</h1>

        <?php
            
            $sql = "SELECT * FROM contact";
            $result = mysqli_query($con, $sql);

            
            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr id='row-".$row['id']."'>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['number'] . "</td>
                            <td>" . $row['message'] . "</td>
                            <td>
                                <button class='edit-btn' onclick='editRecord(".$row['id'].", \"".$row['name']."\", \"".$row['email']."\", \"".$row['number']."\", \"".$row['message']."\")'>Edit</button>
                                <button class='delete-btn' onclick='deleteRecord(" . $row['id'] . ")'>Delete</button>
                            </td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No messages found.</p>";
            }

            mysqli_close($con); 
        ?>

        
        <div class="form-container" id="editForm">
            <h2>Edit Contact</h2>
            <form method="POST" action="updatecontact.php">
                <input type="hidden" id="editId" name="id" required>
                <label for="name">Name:</label>
                <input type="text" id="editName" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="editEmail" name="email" required>
                <label for="number">Phone Number:</label>
                <input type="text" id="editNumber" name="number" required>
                <label for="message">Message:</label>
                <textarea id="editMessage" name="message" required></textarea>
                <button type="submit" class="edit-btn">Update</button>
            </form>
        </div>

    </div>

    
    <script>
        function deleteRecord(id) {

            if (confirm("Are you sure you want to delete this record?")) {

                var xhr = new XMLHttpRequest();
                xhr.open("GET", "deletecon.php?id=" + id, true);
                xhr.onreadystatechange = function() {

                    if (xhr.readyState === 4 && xhr.status === 200) {

                        var row = document.getElementById("row-" + id);
                        row.parentNode.removeChild(row);
                        alert("Record deleted successfully.");
                    }
                };
                xhr.send();
            }
            }


            function editRecord(id, name, email, number, message) {

            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editNumber').value = number;
            document.getElementById('editMessage').value = message;

            document.getElementById('editForm').style.display = 'block';
            }


            function updateRecord() {

            var id = document.getElementById('editId').value;
            var name = document.getElementById('editName').value;
            var email = document.getElementById('editEmail').value;
            var number = document.getElementById('editNumber').value;
            var message = document.getElementById('editMessage').value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updatecontact.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Record updated successfully.");
                    window.location.reload();
                }
            };


            var params = "id=" + id + "&name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&number=" + encodeURIComponent(number) + "&message=" + encodeURIComponent(message);
            xhr.send(params);
            }


            document.querySelector('#editForm form').addEventListener('submit', function(event) {
            event.preventDefault();
            updateRecord();
            });
    </script>

</body>
</html>
