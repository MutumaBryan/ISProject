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
        <title>Welcome</title>
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
      <h3 align="center">New Club Request</h3><br />
      <fieldset style="width: 30%; margin-left: 35%;">
          <form method="POST" action="authorizeclub.php">
              <div class="row">
<!--                  <div class="col">
                      <input type="text" class="form-control" name="clubID" placeholder="Club ID" required="required">
                  </div>-->
                  <div class="col">
                      <input type="text" class="form-control"  placeholder="Club Name" name="clubname" required="required">
                  </div>
                  <div class="col">
                      <label for="inputState">Club Status</label>
                      <select id="inputState" class="form-control" name="status">
                          <option>Active</option>
                          <option>Inactive</option>
                        </select>
                  </div>
                  <div class="col" style="margin-top: 10px;">
                      <textarea class="form-control" rows="4" name="text" required="required" placeholder="Club Description"></textarea><br>
                  </div>
                  <div class="col">
              <button type="submit" name="submit1" class="btn btn-primary">Accept</button>
              <a href="logout.php"><button type="submit" name="submit2" class="btn btn-danger">Deny</button></a>
              </div>
              </div>
          </form>
</form>
      </fieldset>
</body>
</html>
<?php
 if(isset($_POST['submit1']))
     {
     $clubname=$_POST['clubname'];
     $status=$_POST['status'];
     $text=$_POST['text'];
     $sql="INSERT INTO `club`(`club_Name`, `club_description`, `club_status`) VALUES ('$clubname', '$text', '$status');";
     mysqli_query($con, $sql);
     if(mysqli_affected_rows($con)>0){
        echo '<script language="javascript">';
        echo 'alert("club added successfully")';
        echo '</script>';
     }
     }
     ?>
