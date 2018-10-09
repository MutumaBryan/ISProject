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
        <title>Create</title>
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

      <h3 align="center">New Club Request</h3><br />
      <fieldset style="width: 30%; margin-left: 35%;">
          <form method="post" action="createclub.php">
              <div class="container">
                    <div class="form-group row">
                            <div class="col-xs-3">
                      <input type="text" class="form-control" name="clubID" placeholder="Club ID" required="required">
                  </div>
                    </div>
                  <div class="form-group row">
                            <div class="col-xs-3">
                      <input type="text" class="form-control"  placeholder="Club Name" name="clubname" required="required">
                            </div></div>
                  <div class="form-group row">
                            <div class="col-xs-3">
                      <label for="inputState">Club Status</label>
                      <select id="inputState" class="form-control" name="status">
                          <option>Active</option>
                          <option>Inactive</option>
                        </select>
                            </div></div>
                  <div class="form-group row">
                            <div class="col-xs-3">
                    <textarea class="form-control" rows="4" name="text" required="required" placeholder="Club Description"></textarea>
                            </div></div>
              </div>
              <div class="form-group row">
                            <div class="col-xs-3">
              <button type="submit" name="submit" class="btn btn-primary">Send Request</button>
              <a href="Adminstrator.php"><button type="submit" name="submit2" class="btn btn-danger">Back</button></a>
                            </div></div>
</form>
      </fieldset>
</body>
</html>
<?php

 if(isset($_POST['submit'])){ 
$clubname=$_POST['clubname'];
$text=$_POST['text'];
require_once('PHPMailer-master/PHPMailerAutoload.php');
$mailer= new PHPMailer();
$mailer->isSMTP();
$mailer->SMTPAuth=true;
$mailer->SMTPSecure='ssl';
$mailer->Host='smtp.gmail.com';
$mailer->Port='587';
$mailer->isHTML();
$mailer->Username='brayantim22@gmail.com';
$mailer->Password='86933507';
$mailer->SetFrom('no-reply@howcode.org');
$mailer->Subject='NEW CLUB REQUEST';//subject of the email
$mailer->Body="Hello, Did you authorize the addition of the club named '.$clubname.'?  '.$text.'.  Go to 10.51.40.61/ISProject_1/authorizeclub.php accept or deny this addition.";
$mailer->AddAddress('david.mwangi.john@gmail.com');
$mailer->Send();  
echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
 }
?>