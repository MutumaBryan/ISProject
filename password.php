<?php
$con= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
?>      <?php 
      session_start();
      if(!empty($_SESSION['username']) || !empty($_SESSION['userid']))
      {
      ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
  <link rel="stylesheet"  href="CSS/homepage.css">
  
    
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
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    
    <fieldset style="width: 30%; margin-left: 35%; margin-top:5%; border: 1px solid black; padding: 25px; border-radius: 5px;">
    <form name="frmChange" method="post" action="password.php" onSubmit="return validatePassword()" style="width: 29%;">
        <div class="container">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <h3>Change Password</h3>
            <div class="form-group row">
                <div class="col-xs-3">
                    <p style="font-size: 18px;">Current Password</p>
                    <input type="password" class="form-control" name="currentPassword"/><span id="currentPassword"  class="required"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                       <p style="font-size: 18px;">New Password</p>
                       <input type="password" class="form-control" name="newPassword"/><span id="newPassword" class="required"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <p style="font-size: 18px;">Confirm Password</p>
                    <input type="password" class="form-control" name="confirmPassword"/><span id="confirmPassword" class="required"></span>
                </div>
            </div>
                <button class="btn btn-primary"type="submit" name="submit" class="btnSubmit">Submit</button>
                
            </div>
        </div>
    </form><br>
    <form method="post" action="clubs.php" style="margin-left: 10px;">
            <button type="submit" name="back" class="btn btn-danger">Back</button>
        </form>
    </fieldset>
</body>
      
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
} 	
return output;
}
</script>
</html>
<?php
if(count($_POST)>0) {
$user=$_SESSION["userid"];
$result = mysqli_query($con,"SELECT * FROM `club_member` WHERE `Student_ID`='".$user."'");
$row=mysqli_fetch_array($result);
$pass=$_POST["currentPassword"];
$p=md5($pass);
if($p == $row["Password"]) {
    $str=$_POST["newPassword"];
    $newpass=md5($str);
mysqli_query($con,"UPDATE `club_member` set Password='". $newpass ."' WHERE `Student_ID`='".$user."'");
$message = '<script language="javascript">
            alert("Password changed successfully");
            </script>';
echo $message;
} else {$message = "Current Password is not correct";}
}
if(isset($_POST['back'])){
    
$studentID = $_SESSION['userid'];

    //login for a member
    $sqlcmemberLogin = "SELECT * FROM `club_member` WHERE `Student_ID`='$studentID'";
    $memberresult = mysqli_query($con,$sqlcmemberLogin);
    //login for official
    $sqlcofficialLogin = "SELECT * FROM `club_member` WHERE `Student_ID`='$studentID'";
    $officialresult = mysqli_query($con,$sqlcofficialLogin);
    //login for administator
    $sqladminLogin = "SELECT * FROM `adminlogin` WHERE `ID`='$studentID'";
    $adminresult = mysqli_query($con,$sqladminLogin);
   
    if(mysqli_num_rows($memberresult)==1)
    {
       header('Location:Student_Member.php'); 
    }else if(mysqli_num_rows($officialresult)==1)
    {
        header('Location:Official.php'); 
    }  else if(mysqli_num_rows($adminresult)==1) {
        header('Location:adminhome.php'); 
    }else
    {
        
    }
                 }
    ?>
?>
<?php
      }
      else{
          header('Location: index.php');
      }
?>