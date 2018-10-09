 <?php
$con= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
?>     
<?php 
      session_start();
      if(!empty($_SESSION['username']))
      {
      ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrator</title>
        <style>

</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="CSS/homepage.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
</head>
    
    
<body style="background-color: #EEEEEE;">
<div style="fixed: top;">
<nav class="navbar navbar-light" style="background-color: #2196F3">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="adminhome.php">
            <div class="erclogo"><img src='PICS/Capture.PNG' width='240' height='100' style="margin-top: -18px; margin-left: -19px;
                 height: 76.5px; border-bottom-right-radius: 3%; border-top-right-radius: 5%; border-bottom-left-radius: 5%;">
        </div></a>
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="adminhome.php">Home</a></li>
        <li><a href="clubs.php">Clubs</a></li>
      <li><a href="Adminstrator.php">Club Management</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="password.php">Change Passsword</a></li>
      <li class="navbar navbar-right"><a href="logout.php">Log out</a></li>
    </ul>
      
  </div>
</nav>
</div>
    
<div style='background-color: white; margin-top: -17px;'>
 
<!--Automatic Slide Show-->       
<!--<div class="w3-content w3-section">-->
  <div id="slideshow">
      <center><div class="slideshow" style="margin-left: -50px;">
                <img src="PICS/Slideshow/1130kenyadrill.jpg" width="1000" height="400" />
		<img src="PICS/Slideshow/dataanalytics.png" width="1000" height="400" />
		<img src="PICS/Slideshow/img_1140.jpg" width="1000" height="400" />
		<img src="PICS/Slideshow/meuylcm6ejybeied_crxzjnckf_zimu_whhquvs2mmy.jpg" width="1000" height="400" />
		<img src="PICS/Slideshow/strathmore-uni.jpg" width="1000" height="400" />
	</div></center>
   
</div>
<!--</div>-->

<script>
/*$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);*/

$(document).ready(function()
		{
			$('.slideshow').cycle({
			fx: 'scrollLeft' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			});
		});

</script>
</div>
    <!--the near botom section: Dyk and UE--> 
    <div id="nbs">
<!--DID YOU KNOW HTML-->
<section class = "Dyk" style="">
<div id="Dyk">
<h2 style="color:black;">Did You Know?</h2>
<img src="PICS/icons8-Reading-48.png"><br>
       <form method="POST" action="adminhome.php">
              <div class="row">
                  <div class="col" style="margin-top: 10px;">
                      <textarea class="form-control" rows="4" name="text" required="required" placeholder="Enter Did You Know?"></textarea><br>
                  </div>
                  <div class="col">
              <button type="submit" name="submit1" class="btn btn-primary">Add</button>            
              </div>
              </div>
</form>
<?php
 if(isset($_POST['submit1']))
     {
     $text=$_POST['text'];
     $sql="INSERT INTO `home`(`dykText`) VALUES('$text');";
     mysqli_query($con, $sql);

     }
     ?>
 <?php
        $res=mysqli_query($con,"SELECT * FROM `home`");
           while ($row=mysqli_fetch_array($res)) {
        echo '<hr>'; echo '<p>'; echo $row ["dykText"];  
        echo '   <form action="adminhome.php" method="post">
        <input type="hidden" name="delete_id" value="';echo $row["dykID"];echo'" />
        <button type="submit" name="submit2" class="btn btn-danger">x</button>
      </form>';echo '<hr>';
           }
           if(isset($_POST['delete_id'])){
                $delete_id = mysqli_real_escape_string($con,$_POST['delete_id']);
               $sql="DELETE FROM `home` WHERE `dykID`='$delete_id'";
               mysqli_query($con,$sql);
           }
        ?>

</div>
</section>

<!--UPCOMING EVENTS HTML-->    
<section class="UE">
<div id="UE">
        <h2 style="color:black;">Upcoming Events</h2>
        <img src="PICS/icons8-Calendar-48.png">
                <?php
        $res=mysqli_query($con,"SELECT * FROM `activities` WHERE `Date`>cast(now() as date)");
           while ($row=mysqli_fetch_array($res)) {
        echo '<hr>'; echo $row ["club_Name"];echo '<br><p>'; echo $row ["club_activities"];  echo '</p>'; echo $row ["Date"]; echo '<hr>';
           }
        ?>
</div></section>
<section class="livefeed">
<div id="livefeed">
        <h2 style="color:black;">Live Feed</h2>
<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/hashtag/SUMarketingRoundtable?src=hash&amp;ref_src=twsrc%5Etfw">#SUMarketingRoundtable</a><br>Weslene: Enhance your professional skills earlier before venturing the marketing field such as through CIM course</p>&mdash; StrathmoreUniversity (@StrathU) <a href="https://twitter.com/StrathU/status/928990162775953409?ref_src=twsrc%5Etfw">November 10, 2017</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">The end of a journey is the start of another journey, congrats to the graduating class of 2017.<a href="https://twitter.com/hashtag/SUGraduation2017?src=hash&amp;ref_src=twsrc%5Etfw">#SUGraduation2017</a> <a href="https://twitter.com/hashtag/AlumniSU?src=hash&amp;ref_src=twsrc%5Etfw">#AlumniSU</a> <a href="https://t.co/bbzhEHDlGn">pic.twitter.com/bbzhEHDlGn</a></p>&mdash; Strathmore Alumni (@AlumniSU) <a href="https://twitter.com/AlumniSU/status/880704315563941888?ref_src=twsrc%5Etfw">June 30, 2017</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div></section>
</div>
</body>
</html>
<?php
      }
      else{
          header('Location: index.php');
      }
?>


