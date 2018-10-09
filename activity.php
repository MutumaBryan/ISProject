<?php
$con= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
?>       <?php 
      session_start();
      if(!empty($_SESSION['username']))
      {
      ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activities</title>
        <style>

</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
    
  <body class="parallax-demo">
      <header>
  <nav style="background-color: #2196F3;">
    <div class="container">
      <div class="nav-wrapper">
          <a href="clubs.php" class="brand-logo" >Clubs and Societies</a>
<!--        <ul class="right side-nav" id="nav-mobile">
          <li class="hide-on-small-only"><a href="collapsible.html"><i class="material-icons">arrow_back</i></a></li>
        </ul>
        <a class="button-collapse" href="#" data-activates='nav-mobile'><i class="material-icons">menu</i></a>-->
      </div>
    </div>
  </nav>
</header>
<?php
$con= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
?>

<?php  
echo'
<html>
    <head>
</head>
<body>';
        echo'</body>';
        echo'</html>';
if (!isset($_POST["Search1"]))
{
$res=mysqli_query($con,"SELECT * FROM `activities` WHERE `Date`>cast(now() as date)");
    echo'
<html>
    <head>
</head>
<body>
<div class="table-responsive">';
    echo'<h3 align="center">Club Activities</h3>';
    echo "<table class=\"table table-bordered\">";
   
    echo "<tr>";
    echo "<th>"; echo "Club ID"; echo "</th>";
    echo "<th>"; echo "Club Name"; echo "</th>";
    echo "<th>"; echo "Club Activity"; echo "</th>";
    echo "<th>"; echo "Date(YY-MM-DD)"; echo "</th>";
    echo "<th>";  echo "</th>";
    echo "</tr>";
    while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>"; echo $row ["club_ID"];  echo "</td>";
        echo "<td>"; echo $row ["club_Name"];  echo "</td>";
        echo "<td>"; echo $row ["club_activities"];  echo "</td>";
        echo "<td>"; echo $row ["Date"];  echo "</td>";
        echo "<td>"; echo '<form action="activity.php" method="post">
        <input type="hidden" name="delete_id" value="'.$row["eventnumber"].'" />
        <button type="submit" name="btn_add" id="btn_add" style="padding: 3px;" class="btn btn-xs btn-success">Go</button>
      </form>';  echo "</td>";
        echo "</tr>";
}
        echo "</table></div><br>";
        echo'</body>';
        echo'</html>';
}
if (isset($_POST["Search1"]))
{
       $search=$_POST['Search'];   
 $res=mysqli_query($con,"SELECT * FROM `activities` WHERE `club_ID` LIKE '%$search%' OR `club_Name` LIKE '%$search%' OR `club_activities` LIKE '%$search%'");
   echo'
<html>
    <head>
</head>
<body>
<h3>Search Results...</h3>
<div class="table-responsive">';
    echo "<table class=\"table table-bordered\">";
   
    echo "<tr>";
    echo "<th>"; echo "Club ID"; echo "</th>";
    echo "<th>"; echo "Club Name"; echo "</th>";
    echo "<th>"; echo "Club Activity"; echo "</th>";
    echo "<th>"; echo "Date(YY-MM-DD)"; echo "</th>";
    echo "<th width=15%>";  echo "</th>"; 
    echo "</tr>";
    while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>"; echo $row ["club_ID"];  echo "</td>";
        echo "<td>"; echo $row ["club_Name"];  echo "</td>";
        echo "<td>"; echo $row ["club_activities"];  echo "</td>";
        echo "<td>"; echo $row ["Date"];  echo "</td>";
        echo "<td width=15%>"; echo '<form action="activity.php" method="post">
        <input type="hidden" name="delete_id" value="'.$row["eventnumber"].'" />
        <button type="submit" name="btn_add" id="btn_add" style="padding: 3px;" class="btn btn-xs btn-success">Go</button>
      </form>';  echo "</td>";        
        echo "</tr>";
}
        echo "</table></div>";
        echo'</body>';
        echo'</html>';
}
if(isset($_POST['delete_id'])){
$id = (isset($_POST['delete_id']) ? $_POST['delete_id'] : '');
 $sql="SELECT * FROM `activities` WHERE `eventnumber`='$id'";
 $result=mysqli_query($con,$sql);
 while ($row1 = mysqli_fetch_array($result)) {
                    $event=$row1['club_activities'];
                    $club=$row1['club_ID'];
                    $eventname1=$event.'_'.$club;
                    $eventname=strtolower($eventname1);
     $studentID=$_SESSION['userid'];
     $studentName=$_SESSION['username'];
     $query="SELECT * FROM `$eventname` WHERE `Studentid`='$studentID' AND `StudentName`='$studentName'";
     $res= mysqli_query($con, $query);
     if(mysqli_num_rows($res)==1)
     {
         echo "<script>"
            . "alert('Oops,seems you already a member!');"
            . "</script>";
     }
     else{
     $sq="INSERT INTO `$eventname`(`Studentid`,`StudentName`) VALUES('$studentID','$studentName')";
     mysqli_query($con, $sq);
        echo '<script language="javascript">';
        echo 'alert("See you Then!")';
        echo '</script>';
     }
 }
}
?><a href="clubs.php" style="margin-left: 30px;"><button type="submit" name="submit2" class="btn btn-danger">Back</button></a>
<?php
      }
      else{
          header('Location: index.php');
      }
?>