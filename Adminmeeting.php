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
        <title>Meetings</title>
        <style>

</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
    
<body style="background-color: #EEEEEE;">
<div style="fixed: top;">
<nav class="navbar navbar-light" style="background-color: #2196F3">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <div class="erclogo"><img src='userPICS/Capture.PNG' width='240' height='100' style="margin-top: -18px; margin-left: -19px;
                 height: 76.5px; border-bottom-right-radius: 3%; border-top-right-radius: 5%; border-bottom-left-radius: 5%;">
        </div></a>
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="clubs.php">Clubs</a></li>
      <li class="navbar navbar-right"><a href="Adminstrator.php">Manage Clubs</a></li>
    </ul>
      <form class="navbar-form navbar-right" style="margin-top: 20px;" method="post">
      <div class="input-group">
        <input type="text" class="form-control" name="Search" placeholder="Search">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit" name="Search1">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>
</div>
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
$res=mysqli_query($con,"SELECT * FROM `meetings` ");
    echo'
<html>
    <head>
</style>
</head>
<body>
<div class=\"container\">
<div class="table-responsive">';
    echo'<h3 align="center">Club Meetings</h3>';
    echo "<table class=\"table table-bordered\">";
   
    echo "<tr>";
    echo "<th width=5%>"; echo "About"; echo "</th>";
    echo "<th width=10%>"; echo "Minutes"; echo "</th>";
    echo "<th width=10%>"; echo "Club Id"; echo "</th>";
    echo "<th width=10%>"; echo "Club Name"; echo "</th>";
    echo "<th width=10%>"; echo "Club secretary"; echo "</th>";
    echo "<th width=10%>"; echo "Date"; echo "</th>";
    echo "</tr>";
    while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>"; echo $row ["About"];  echo "</td>";
        echo "<td><a href='"; echo $row ["Minutes"];  echo "'><img src='PICS/icons8-download-from-ftp.png' width='30'> "; echo $row ["Minutes"];echo "</a></td>";
        echo "<td>"; echo $row ["Club ID"];  echo "</td>";
        echo "<td>"; echo $row ["Club Name"];  echo "</td>";
        echo "<td>"; echo $row ["Club secretary"];  echo "</td>";
        echo "<td>"; echo $row ["Date"];  echo "</td>";
        echo "</tr>";
}
        echo "</table></div><br>";
        echo'</body>';
        echo'</html>';
}
if (isset($_POST["Search1"]))
{
 $res=mysqli_query($con,"SELECT * FROM `club_member` WHERE `About`= '$_POST[Search]' OR `Minutes`= '$_POST[Search]' OR `Club ID`= '$_POST[Search]' OR `Club Name`='$_POST[Search]' OR `Club secretary`= '$_POST[Search]' OR `Date`='$_POST[Search]'");
   echo'
<html>
    <head>
</head>
<body>
<h3>Search Results...</h3>
<div class=\"container\">
<div class="table-responsive">';
    echo "<table class=\"table table-bordered\">";
   
    echo "<tr>";
    echo "<th width=5%>"; echo "About"; echo "</th>";
    echo "<th width=10%>"; echo "Minutes"; echo "</th>";
    echo "<th width=10%>"; echo "Club Id"; echo "</th>";
    echo "<th width=10%>"; echo "Club Name"; echo "</th>";
    echo "<th width=10%>"; echo "Club secretary"; echo "</th>";
    echo "<th width=10%>"; echo "Date"; echo "</th>";
    echo "</tr>";
    while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>"; echo $row ["About"];  echo "</td>";
        echo "<td>"; echo $row ["Minutes"];  echo "</td>";
        echo "<td>"; echo $row ["Club ID"];  echo "</td>";
        echo "<td>"; echo $row ["Club Name"];  echo "</td>";
        echo "<td>"; echo $row ["Club secretary"];  echo "</td>";
        echo "<td>"; echo $row ["Date"];  echo "</td>";
        echo "</tr>";
}
        echo "</table></div>";
        echo'</body>';
        echo'</html>';
}
?><a href="Adminstrator.php"><button type="submit" style="margin-left: 60px;" name="submit2" class="btn btn-danger">Back</button></a>