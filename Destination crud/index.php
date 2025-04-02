<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Dashboard</title>
    <link rel="stylesheet" href="css/styles.css"> 
  
</head>
<body>
    

<h1 class="title">Explore & Manage Beautiful Destinations</h1>

<div class="dashboard">
    
    <div class="card">
        <img class="default-image" src="../Destination crud/uploads/create.jpg" alt="View Destinations">
        <img class="hover-image" src="../Destination crud/uploads/dashboard1.jpg" alt="View Destinations Hover">
        <div class="card-content">
            <h3 class="card-title">View Destinations</h3>
            <p class="card-text">View and manage your entire destination list to ensure all details are current and accurate.</p>
        </div>
        <div class="card-actions">
            <button onclick="window.location.href='../Destination crud/destination_home.php';">View Destinations</button>
        </div>
    </div>

  
    <div class="card">
        <img class="default-image" src="../Destination crud/uploads/destination.jpg" alt="Add New Destination">
        <img class="hover-image" src="../Destination crud/uploads/dashboard2.jpg" alt="Add New Destination Hover">
        <div class="card-content">
            <h3 class="card-title">Add New Destination</h3>
            <p class="card-text">Easily create and add new destinations to your system for seamless management and updates.</p>
        </div>
        <div class="card-actions">
            <button onclick="window.location.href='add_destination.php';">Add Destination</button>
        </div>
    </div>
</div>

</body>
</html>
