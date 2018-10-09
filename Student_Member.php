      <?php 
      session_start();
      if(!empty($_SESSION['username']))
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
        <title>Student</title>
        <style>
            #contact {
                    -webkit-user-select: none; /* Chrome/Safari */
                    -moz-user-select: none; /* Firefox */
                    -ms-user-select: none; /* IE10+ */
                    width: 100%;
                    font-size: 14px;
                    line-height: 30px;
                    cursor: pointer;
                    display: block;
                    padding: 10px 10px 10px 10px;
            }

            #contact:hover {
                    color: #FFF;
            }

            #contactForm {
              display: none;


              padding: 2em;
              width: 400px;
              text-align: center;
              background: #fff;
              position: fixed;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              -webkit-transform: translate(-50%, -50%);
            }
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
<nav class="navbar navbar-light" style="background-color: #64B5F6">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="Student_Member.php">
            <div class="erclogo"><img src='userPICS/erc_logo-01_fw_large.png' width='300' height='100' style="margin-top: -18px; margin-left: -19px;
                 height: 76.5px; border-bottom-right-radius: 3%; border-top-right-radius: 5%; border-bottom-left-radius: 5%;">
        </div></a>
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="Student_Member.php">Home</a></li>
      <li><a href="clubs.php">Clubs</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="password.php">Change Passsword</a></li>
      <li class="navbar navbar-right"><a href="logout.php">Log out</a></li>
    </ul>
  </div>
</nav>
</div>
    
<div style='background-color: white; margin-top: 30px;'>
 
<!--Automatic Slide Show-->       
<div class="w3-content w3-section">
  <div id="slideshow">
      <center><div class="slideshow" style="margin-left: -50px;">
                <img src="userPICS/Slideshow/1130kenyadrill.JPG" width="1000" height="400" />
		<img src="userPICS/Slideshow/dataanalytics.png" width="1000" height="400" />
		<img src="userPICS/Slideshow/img_1140.jpg" width="1000" height="400" />
		<img src="userPICS/Slideshow/meuylcm6ejybeied_crxzjnckf_zimu_whhquvs2mmy.jpg" width="1000" height="400" />
		<img src="userPICS/Slideshow/strathmore-uni.jpg" width="1000" height="400" />
	</div></center>
   
</div>
</div>

<script>
$(document).ready(function()
		{
			$('.slideshow').cycle({
			fx: 'scrollLeft' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			});
		});

</script>
</div>
<!--DID YOU KNOW HTML-->    
<section class = "Dyk" style="">
<div id="Dyk">
        <h2 style="color:black;">Did You Know?</h2>
<img src="PICS/icons8-Reading-48.png"><br>
        <?php
        $res=mysqli_query($con,"SELECT `dykText` FROM `home`");
           while ($row=mysqli_fetch_array($res)) {
        echo '<hr>'; echo '<p>'; echo $row ["dykText"];  echo '</p>'; echo '<hr>';
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
</div></section
<!--LIVE FEED HTML-->    
<section class="livefeed">
    <div id="livefeed">
        <p> <h2 style="color:black;">Live Feed</h2>
<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/hashtag/SUMarketingRoundtable?src=hash&amp;ref_src=twsrc%5Etfw">#SUMarketingRoundtable</a><br>Weslene: Enhance your professional skills earlier before venturing the marketing field such as through CIM course</p>&mdash; StrathmoreUniversity (@StrathU) <a href="https://twitter.com/StrathU/status/928990162775953409?ref_src=twsrc%5Etfw">November 10, 2017</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">The end of a journey is the start of another journey, congrats to the graduating class of 2017.<a href="https://twitter.com/hashtag/SUGraduation2017?src=hash&amp;ref_src=twsrc%5Etfw">#SUGraduation2017</a> <a href="https://twitter.com/hashtag/AlumniSU?src=hash&amp;ref_src=twsrc%5Etfw">#AlumniSU</a> <a href="https://t.co/bbzhEHDlGn">pic.twitter.com/bbzhEHDlGn</a></p>&mdash; Strathmore Alumni (@AlumniSU) <a href="https://twitter.com/AlumniSU/status/880704315563941888?ref_src=twsrc%5Etfw">June 30, 2017</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div></section>
        </div>
	<div class="wrapper">
		<footer>
			<div class="clearfix">
				
				<ul class="nav navbar-nav">
					<li>
						<a href="https://www.facebook.com/StrathmoreUniversity/"><img height="30px" src="PICS/icons8-Facebook-48.png" width="30px"></a>
					</li>
					<li>
						<div id='contact'><img height="30px" src="PICS/icons8-WhatsApp-48.png" width="30px"></div>
					</li>
					<li>
						<a href="https://twitter.com/strathu?lang=en"><img height="30px" src="PICS/icons8-Twitter-50.png" width="30px"></a>
					</li>
				</ul>
			</div>
		</footer>
	</div>
         <div id='contactForm'>    
        <h3> Official's Contacts</h3>
        <div class="content">
                    <section>
                        <form action="" method="POST" name="evForm" enctype="multipart/form-data">
                            <?php 
                            $sq="SELECT `Contacts`,`Club_Name`  FROM `club_member` WHERE `status` LIKE '%official%' ";
                            $res=mysqli_query($con,$sq);
                            while ($row1 = mysqli_fetch_array($res)) {
                                echo"<label> Contacts ";echo $row1['Club_Name'];echo ":"; echo "</label>"; echo $row1['Contacts'];echo "<br>";
                            }
                            ?>
                        </form>
                </section>
        </div>
        </div>
</body>
</html>
<script type="text/javascript">
		  // Check for valid email syntax
		$(function() {

		// contact form animations
		$('#contact').click(function() {
		  $('#contactForm').fadeToggle();
		})
		$(document).mouseup(function (e) {
		  var container = $("#contactForm");

		  if (!container.is(e.target) // if the target of the click isn't the container...
		      && container.has(e.target).length === 0) // ... nor a descendant of the container
		  {
		      container.fadeOut();
		  }
		});

		});
		</script>
    <?php
	      }
	      else{
	          header('Location: index.php');
	      }
	?>
