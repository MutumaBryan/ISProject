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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Attendance</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
<h3 align="center" style="color:black;">Attendance</h3><br />
        <fieldset style="width: 30%; margin-left: 35%;">
            <form method="POST" action="officialeventsattendance.php">
                 <label for="activity" style='font-size:18px;'>Club Activities</label>
                <select id="activity" name='activity' class="form-control">
                <?php
                $sql = "SELECT * FROM `activities`";
                $result = mysqli_query($con,$sql);
               
                while ($row = mysqli_fetch_array($result))
                        {
                    $event=$row['club_activities'];
                    $club=$row['club_ID'];
                    $eventname1=$event.'_'.$club;
                    $eventname=strtolower($eventname1);
                    $id=$row['eventnumber'];
                    echo "<option value='".$eventname."'>$eventname</option>";
                        }
                        ?>
                </select><br>
                <button type="submit" name="submit3" class="btn btn-primary">Show Attendees</button>
            </form><br>
        </fieldset>
        <?php 
        if(isset($_POST['submit3']))
        {
            $table=(isset($_POST['activity']) ? $_POST['activity'] : '');
            $sq="SELECT * FROM `$table`";
            $res=mysqli_query($con, $sq);
            
            
            echo " <div class=\"container\">";
            echo "<h3>";
            echo $table;echo "</h3>";
          echo "<div class=\"table-responsive\"><table class=\"table table-bordered\">";
            echo "<tr>";
            echo "<th width=20%>"; echo "Student Name"; echo "</th>";
            echo "<th width=20%>"; echo "Student ID"; echo "</th>";
            echo "</tr>";
            while ($row=mysqli_fetch_array($res))
                    {
                echo "<tr>";
                echo "<td >"; echo $row ["Studentid"];  echo "</td>";
                echo "<td>"; echo $row ["StudentName"];  echo "</td>";
                echo "</tr>";
            }
                echo "</table></div><br>";
        }
        ?>
<a href="clubOfficial.php"><button type="submit" style="margin-left: 60px;" name="submit2" class="btn btn-danger">Back</button></a>
    </body>
</html>
<?php
      }
      else{
          header('Location: index.php');
      }
?>