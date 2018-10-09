<?php
    //variables
    $Host_Name = 'localhost';
    $Database_User = 'root';
    $Password = '';
    $Database_name = 'is_project_one';
    
    //connection
    $con = mysqli_connect($Host_Name, $Database_User, $Password, $Database_name);
    
    if($con)
    {
//        echo("Successful Connection");
    }
    //error in connection
    elseif (mysqli_connect_errno()) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        echo("Failure");
    }
?>