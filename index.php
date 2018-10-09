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
<!DOCTYPE html>
<html>
<head>
    
	<title>LOGIN</title>
<!--        <script>
            alert('good');
            </script>-->
<!--        CSS links-->
<link rel="stylesheet" type="text/css" href="CSS/login.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.2.4/sweetalert2.min.css">

<!--        jscript links-->
<script type="text/javascript" src="JS/loginjs.js"></script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.2.4/sweetalert2.min.js"></script>
        
</head>

<body>

    
<div class="wrapper">
 <div class="container">
  <h1>Welcome</h1>

  <form class="form" action="index.php" method="POST">
      <input type="text" placeholder="Student ID" name="ID" id="ID" required="required">
      <input type="password" placeholder="Password" name="password" id="password" required="required">
   <button type="submit" id="login-button" name="login">Login</button>
  </form>
  
 </div>

 <ul class="bg-bubbles">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
 </ul>
</div>
  
</form>
    
</body>
</html>
<?php

if(isset($_POST['login']))
{
    
$studentID = isset($_POST["ID"]) ? $_POST["ID"] : '';
$studentPassword1 = isset($_POST["password"]) ? $_POST["password"] : '';
$studentPassword = md5($studentPassword1);

    //login for a member
    $sqlcmemberLogin = "SELECT * FROM `club_member` WHERE `status` LIKE '%member%' AND `Student_ID`='$studentID' AND`Password`='$studentPassword'";
    $memberresult = mysqli_query($con,$sqlcmemberLogin);
    //login for official
    $sqlcofficialLogin = "SELECT * FROM `club_member` WHERE `status` LIKE '%Official%' AND `Student_ID`='$studentID' AND `Password`='$studentPassword'";
    $officialresult = mysqli_query($con,$sqlcofficialLogin);
    //login for administator
    $sqladminLogin = "SELECT * FROM `adminlogin` WHERE `ID`='$studentID' AND `password`='$studentPassword'";
    $adminresult = mysqli_query($con,$sqladminLogin);
    
    //check if member
    if(mysqli_num_rows($memberresult)==1)
    {
    while ($row = mysqli_fetch_array($memberresult, MYSQLI_BOTH))
        {
            $MemberId = $row['Student_ID'];
            $MemberName = $row['Student_Name'];
            $MemberPass = $row['Password'];
            $club=$row['Club_Name'];
            $clubid=$row['club_id'];
            if(mysqli_num_rows($memberresult)==1)
            {
                            $_SESSION['username'] = $MemberName;
                            $_SESSION['userid'] = $MemberId;
                            $_SESSION['password'] = $MemberPass;
                            $_SESSION['Club_Name']=$club;
                            $_SESSION['club_id']=$clubid;
                            echo "<script type=\"text/javascript\">
                                swal({
                                title: 'Successful Login',
                                text: 'You have Entered the Correct Details.',
                                type: 'success',
                                timer: 2000,
                                //2 seconds
                                onOpen: function () {
                                  swal.showLoading()
                                }
                              }).then(
                                function () {},
                                // handling the promise rejection
                                function (dismiss) {
                                  if (dismiss === 'timer') {
                                    document.location.href='Student_Member.php';
                                  }
                                }
                              );
                                </script>";
            }
        }
    }
    //check if official
    elseif(mysqli_num_rows($officialresult)==1)
    {
        while ($row = mysqli_fetch_array($officialresult, MYSQLI_BOTH))
        {
            $OfficialId = $row['Student_ID'];
            $OfficialName = $row['Student_Name'];
            $OfficialPass = $row['Password'];
            $club=$row['Club_Name'];
            $clubid=$row['club_id'];
            if(mysqli_num_rows($officialresult)==1)
            {   
            
                $_SESSION['username'] = $OfficialName;
                $_SESSION['userid'] = $OfficialId;
                $_SESSION['password'] = $OfficialPass;
                $_SESSION['Club_Name']=$club;
                $_SESSION['club_id']=$clubid;
                echo "<script type=\"text/javascript\">
                    swal({
                    title: 'Successful Login',
                    text: 'You have Entered the Correct Details.',
                    type: 'success',
                    timer: 2000,
                    //2 seconds
                    onOpen: function () {
                      swal.showLoading()
                    }
                  }).then(
                    function () {},
                    // handling the promise rejection
                    function (dismiss) {
                      if (dismiss === 'timer') {
                        document.location.href='Official.php';
                      }
                    }
                  );
                    </script>";
//                header('Location: Official.php');
            }
        }
    }
    //check if administrator
    elseif(mysqli_num_rows($adminresult)==1)
    {
        while ($row = mysqli_fetch_array($adminresult, MYSQLI_BOTH))
        {
            $AdminId = $row['ID'];
            $AdminName = $row['username'];
            $AdminPass = $row['password'];

            if(mysqli_num_rows($adminresult)==1)
            {
                            $_SESSION['username'] = $AdminName;
                            $_SESSION['userid'] = $AdminId;
                            $_SESSION['password'] = $AdminPass;
                            echo "<script type=\"text/javascript\">
                                swal({
                                title: 'Successful Login',
                                text: 'You have Entered the Correct Details.',
                                type: 'success',
                                timer: 2000,
                                //2 seconds
                                onOpen: function () {
                                  swal.showLoading()
                                }
                              }).then(
                                function () {},
                                // handling the promise rejection
                                function (dismiss) {
                                  if (dismiss === 'timer') {
                                    document.location.href='adminhome.php';
                                  }
                                }
                              );
                                </script>";
            //                header('Location: adminhome.php');
            }
                 
            }
    }else
            {
                //code for failed login
                echo "<script type=\"text/javascript\">
                    swal({
                    title: 'Failed Login',
                    text: 'Enter Correct Login Details',
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#42A5F5',
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    closeOnConfirm: true
                    })
                    </script>";
                echo'<p style="color:black;">happening</p>';
            }
    }
     


mysqli_close($con);
?>



