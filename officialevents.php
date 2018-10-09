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
<html>
    <head>
        <meta charset="UTF-8">
        <title>Events</title>
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
    <h3 align="center" style="color:black;">Add Event</h3><br />
<fieldset style="width: 30%; margin-left: 35%; border: 1px solid black; padding: 25px; border-radius: 5px;">
    <form method="POST" action="officialevents.php">
              <div class="container">
                    <div class="form-group row">
                            <div class="col-xs-3">
                      <input type="text" class="form-control"  placeholder="Event Name" name="event" required="required" style="font-size: 16px;">
                  </div>
                    </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                      <input type="text" id="date" class="form-control"  placeholder="yyyy/mm/dd" name="date" required="required" style="font-size: 16px;">
                  </div>
                        </div>
                  <div class="form-group row">
                            <div class="col-xs-3">
              <button type="submit" name="submit1" class="btn btn-primary">Add</button>
              <a href="clubOfficial.php"><button type="submit" name="submit2" class="btn btn-danger">Back</button></a>
              </div>
                  </div>
              </div>
          </form>
      </fieldset>
<?php
if(isset($_POST['submit1']))
    {
     $event1=$_POST['event'];
     $clubid=$_SESSION['club_id'];
     $clubname=$_SESSION['Club_Name'];
     $date=$_POST['date'];
     $event = preg_replace('/\s+/', '', $event1);
     $eventname=$event.'_'.$clubid;
     
     $sql="INSERT INTO `activities`(`club_ID`, `club_Name`, `club_activities`,`Date`) VALUES ('$clubid','$clubname','$event','$date')";
     mysqli_query($con, $sql);
     $sq="CREATE TABLE $eventname(
            attendanceID int NOT NULL AUTO_INCREMENT,
            Studentid varchar(255) NOT NULL,
            StudentName varchar(255),
            PRIMARY KEY (attendanceID)
            );";
     mysqli_query($con, $sq);
        echo '<script language="javascript">';
        echo 'alert("Event Sent successfully")';
        echo '</script>';
     }
     ?>
</div>
</div>
</div>


<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        </body>
</html>
<?php
      }
      else{
          header('Location: index.php');
      }
?>