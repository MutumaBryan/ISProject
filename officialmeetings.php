      <?php 
      session_start();
      if(!empty($_SESSION['username']) || !empty($_SESSION['Club_Name']))
      {
      ?>
<?php 
$con= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
?>
<!DOCTYPE html 5>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Meetings</title>
        <style>
                .inputfile {
                        width: 0.1px;
                        height: 0.1px;
                        opacity: 0;
                        overflow: hidden;
                        position: absolute;
                        z-index: -1;
                }

                .inputfile + label {
                    font-size: 1.25em;
                    font-weight: 700;
                    color: white;
                    background-color: black;
                    display: inline-block;
                }

                .inputfile:focus + label,
                .inputfile + label:hover {
                    background-color: red;
                }
                label {
                    font-size: 18px;
                    cursor: pointer; 
                }
        </style>
<!DOCTYPE html 5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Meetings</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <body class="parallax-demo">
      <header>
        <nav style="background-color: #2196F3; height: 70px;">
          <div class="container">
            <div class="nav-wrapper"style="margin-top: 10px;">
                <a href="clubs.php" class="brand-logo" style="font-size: 35px; color: white;" >Clubs and Societies</a>
            </div>
          </div>
        </nav>
      </header>
    <h3 align="center" style="color:black;">Add Meeting Minutes</h3><br />
<fieldset style="width: 30%; margin-left: 35%;  padding: 25px; border-radius: 5px;">
    <form method="POST" action="officialmeetings.php" enctype="multipart/form-data">
                <div class="container">
                    <div class="form-group row">
                            <div class="col-xs-3">
                                  <input type="text" class="form-control"  placeholder="About" name="about" required="required" style="font-size: 16px;">
                            </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-xs-3">
                                  <label for="file" style="font-size: 18px; color: blue;">Click to enter Minutes File
                                      <input type="file" id="file" name="file" class="inputfile" required="required"><br>
                                    </label>
                              </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-xs-3">
                                  <input type="date" id="date" class="form-control"  placeholder="yyyy/mm/dd" name="date" required="required" style="font-size: 16px;">
                              </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-xs-3">
                                  <input type="text" class="form-control"  placeholder="Secretary Name" name="secretary" required="required" style="font-size: 16px;">
                            </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-xs-3">
                                <button type="submit" name="submit1" class="btn btn-primary">Add</button>
                            </div>
                    </div><div class="form-group row">
                            <div class="col-xs-3">
                                <a href="clubOfficial.php"><button type="submit" name="submit2" class="btn btn-danger">Back</button></a>
                            </div></div>
                    </div>
                </div>
     </form>
</fieldset>
    <?php
if(isset($_POST["submit1"])) {
    
$target_dir = "minutes/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
if(isset($target_file))
{
    $club=$_SESSION['club_id'];
    $clubname=$_SESSION['Club_Name'];
    $about=$_POST['about'];
    $date=$_POST['date'];
    $secretary=$_POST['secretary'];
    $updateimage = "INSERT INTO `meetings`(`About`, `Minutes`, `Club ID`, `Club Name`, `Club secretary`, `Date`) VALUES ('$about','$target_file','$club','$clubname','$secretary','$date')";
    mysqli_query($con, $updateimage);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "<script> alert('The file ". basename( $_FILES["file"]["name"]). " has been uploaded.');</script>";
            } else {
                echo "<script> alert('Sorry, there was an error uploading your file.');</script>";
            }
            echo "<script> alert('Entered successfully');</script>";
}
}
?>
<?php
      }
      else{
          header('Location: index.php');
      }
?>
