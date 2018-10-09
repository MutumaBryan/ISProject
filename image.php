<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
    
    <title>The Clubs</title>
    
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <meta name="theme-color" content="#EE6E73">
    
    <!-- CSS-->
    <link href="http://materializecss.com/css/prism.css" rel="stylesheet">
    <link href="http://materializecss.com/css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  </head>
  <body class="parallax-demo">
      <header>
  <nav style="background-color: #2196F3;">
    <div class="container">
      <div class="nav-wrapper">
        <a href="" class="brand-logo" >Clubs and Societies</a>
      </div>
    </div>
  </nav>
</header>
      <head>
        <?php
            //variables
            $Host_Name = 'localhost';
            $Database_User = 'root';
            $Password = '';
            $Database_name = 'is_project_one';
            //connection
            $con = mysqli_connect($Host_Name, $Database_User, $Password, $Database_name);
            session_start();
        ?>
        <meta charset="UTF-8">
        <title>IMAGE UPLOAD</title>
        <link rel="stylesheet" href="css/style_1.css">
    </head>
    <body>
    <div class="main">    
<!--    <link rel="shortcut icon" type="image/x-icon" href="pictures/Kenya_Police_Flag.gif"/>-->
<fieldset style="width: 90%; border: 1px solid black; padding: 25px; border-radius: 5px;">
<h3>Club Profile Picture</h3>
        <div class="content"><section>
            <form action="image.php" method="POST" name="evForm" enctype="multipart/form-data">
                <h4>Image</h4>
            <input type="text" id="image" name="clubid" placeholder="Club ID" required="required"><br>
            <label
            <input type="file" id="image" name="image" accept="image/*"><br>
            <hr><br>
            <input class="btn btn-7h" name="submit" type="submit" value="ATTACH" />
            </form>
            </section>
        </div>
</fieldset>
    </div>    

<?php
$club_id = $_POST['clubid'];
$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if(isset($_POST["submit"])) {
    $updateimage = "UPDATE `club` SET `club_img`= '$target_file' WHERE `club_ID`= '$club_id' ;" ;
    mysqli_query($con, $updateimage);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "<script> alert(The file ". basename( $_FILES["image"]["name"]). " has been uploaded.);</script>";
            } else {
                echo "<script> alert(Sorry, there was an error uploading your file.);</script>";
            }
}
?>