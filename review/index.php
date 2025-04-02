<html>
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <fieldset>
        <legend><b>Submit a Review</b></legend>
        <form method="post" action="insert.php">
            
            <input type="email" name="useremail" placeholder="User Email" required><br>

            
            <select name="reviewtype" required>
                <option value="" disabled selected>Review Type</option>
                <option value="Hotel">Hotel</option>
                <option value="Vehicle">Vehicle</option>
                <option value="Tour Guide">Tour Guide</option>
            </select><br>

           
            <input type="number" name="rating" placeholder="Rating (1-10)" min="1" max="10" id="rate" required><br>

           
            <textarea name="description" placeholder="Description" rows="4" required></textarea><br>

           
            <input type="date" name="udate" required><br>

           
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </fieldset>
</body>
</html>