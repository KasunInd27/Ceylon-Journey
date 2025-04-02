<html>
<head>
    <link rel="stylesheet" href="upindex.css">
</head>
<body>
    <fieldset>
        <legend><b>Review Update</b></legend>
        <form method="post" action="update.php">
           
            <input type="email" name="useremail" placeholder="User Email" required><br>

           
            <select name="reviewtype" required>
                <option value="" disabled selected>Review Type</option>
                <option value="Hotel">Hotel</option>
                <option value="Vehicle">Vehicle</option>
                <option value="Tour Guide">Tour Guide</option>
            </select><br>

           
            <input type="number" name="rating" placeholder="Rating (1-10)" min="1" max="10" id="rate" required><br>

            
            <textarea name="descrip" placeholder="Description" rows="4" required></textarea><br>

           
            <input type="date" name="date" required><br>

           
            <input type="submit" value="Update">
        </form>
    </fieldset>
</body>
</html>