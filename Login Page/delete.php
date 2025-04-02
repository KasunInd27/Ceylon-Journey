<?php
    include 'php/config.php';

    if(isset($_GET['deleteid']))
    {
        $res_Userid = mysqli_real_escape_string($con, $_GET['deleteid']);

        $sqlQuery = "delete FROM users WHERE User_Id = $res_Userid";
        $result = mysqli_query($con, $sqlQuery);

        if($result)
        {
            header('Location: ../Home/home.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
?>