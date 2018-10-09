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
        <title>Members</title>
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
<style>        #search {
            margin-left: 68%;
            width: 300px;
            border: 1px solid black;
            border-radius: 3px;
            font-size: 16px;
            background-color: white;
            background-image: url("icons8-Search-64.png");
            background-size: 20px;
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            border-radius: 20px;
}
</style>
</head>
<body>';
        echo'</body>';
        echo'</html>';
if (!isset($_POST["Search1"]))
{
    $club=$_SESSION['Club_Name'];
$res=mysqli_query($con,"SELECT * FROM `club_member` WHERE `Club_Name` LIKE '%$club%' ORDER BY `number` ASC; ");
    echo'
<html>
    <head>
</style>
</head>
<body>

<div class="table-responsive">';
    echo'<h3 align="center">Club Members</h3>';
    echo "<div class=\"container\">
          <div class=\"table-responsive\"><table class=\"table table-bordered\">";
   
    echo "<tr>";
    echo "<th width=5%>"; echo "Student ID"; echo "</th>";
    echo "<th width=10%>"; echo "Student Name"; echo "</th>";
    echo "<th width=10%>"; echo "Contacts"; echo "</th>";
    echo "<th width=10%>"; echo "Email Address"; echo "</th>";
    echo "<th width=5%>"; echo "Status"; echo "</th>";
    echo "<th width=25%>"; echo "Club Name"; echo "</th>";
    echo "</tr>";
    while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>"; echo $row ["Student_ID"];  echo "</td>";
        echo "<td>"; echo $row ["Student_Name"];  echo "</td>";
        echo "<td>"; echo $row ["Contacts"];  echo "</td>";
        echo "<td>"; echo $row ["email"];  echo "</td>";
        echo "<td>"; echo $row ["status"];  echo "</td>";
        echo "<td>"; echo $row ["Club_Name"];  echo "</td>";
        echo "</tr>";
}
        echo "</table></div><br>";
        echo'</body>';
        echo'</html>';
}
if (isset($_POST["Search1"]))
{
    $search=$_POST['Search'];
    $club=$_SESSION['Club_Name'];
 $res=mysqli_query($con,"SELECT * FROM `club_member` WHERE `Student_ID` LIKE '%$search%' OR `Student_Name` LIKE '%$search%' OR `Contacts` LIKE '%$search%' OR `email` LIKE '%$search%' OR `status` LIKE '%$search%' AND `Club_Name` LIKE '%$club%'");
   echo'
<html>
    <head>
</head>
<body>
<h3>Search Results...</h3>
<div class="table-responsive">';
    echo "<div class=\"container\">
          <div class=\"table-responsive\"><table class=\"table table-bordered\">";
   
    echo "<tr>";
    echo "<th>"; echo "Student ID"; echo "</th>";
    echo "<th>"; echo "Student Name"; echo "</th>";
    echo "<th>"; echo "Contacts"; echo "</th>";
    echo "<th>"; echo "Email Address"; echo "</th>";
    echo "<th>"; echo "Status"; echo "</th>";
    echo "<th>"; echo "Club Name"; echo "</th>";
    echo "</tr>";
    while ($row=mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>"; echo $row ["Student_ID"];  echo "</td>";
        echo "<td>"; echo $row ["Student_Name"];  echo "</td>";
        echo "<td>"; echo $row ["Contacts"];  echo "</td>";
        echo "<td>"; echo $row ["email"];  echo "</td>";
        echo "<td>"; echo $row ["status"];  echo "</td>";
        echo "<td>"; echo $row ["Club_Name"];  echo "</td>";
        echo "</tr>";
}
        echo "</table></div>";
        echo'</body>';
        echo'</html>';
}
?><a href="clubOfficial.php" style="margin-left: 30px;"><button type="submit" name="submit2" class="btn btn-danger">Back</button></a>
    <?php
      }
      else{
          header('Location: index.php');
      }
      ?></div>
<div class="tab-pane" id="2b">
</div>
</div>
</div>