<?php 
      session_start();
      if(!empty($_SESSION['username']) || !empty($_SESSION['userid']))
      {
      ?><?php
 //variables
 ob_start();
    $Host_Name = 'localhost';
    $Database_User = 'root';
    $Password = '';
    $Database_name = 'is_project_one';
   
    //connection
    $con = mysqli_connect($Host_Name, $Database_User, $Password, $Database_name);?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
    
    <title>The Clubs</title>
    
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <meta name="theme-color" content="#EE6E73">
    
    <!-- CSS-->
    <link href="http://materializecss.com/css/prism.css" rel="stylesheet">
    <link href="http://materializecss.com/css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  </head>
  <body class="parallax-demo">
      <header>
  <nav style="background-color: #2196F3;">
    <div class="container">
      <div class="nav-wrapper">
        <a href="" class="brand-logo" >Clubs and Societies</a>
      </div>
    </div>
  </nav>
</header>

<main>
<!--  Parallax Section  -->
  <div class="parallax-container">
      <div class="parallax"><img src="userPICS/New folder/downloaded pics/Strathmore6.jpg"></div>
  </div>
  <div class="section white">
    <div class="row container">
      <h2 class="header">The Community</h2>
      <p class="grey-text text-darken-3 lighten-3">The Strathmore University Community needs to Expand its Reach of Students and Alumni and create a progressive culture that stretches beyond the school.</p>
      <p class="grey-text text-darken-3 lighten-3">This will change the sociocultural aspect of the institution's students, greatly improving their creative and innovative gifts.</p>
      <p class="grey-text text-darken-3 lighten-3">The Strathmore University Community needs to Expand its Reach of Students and Alumni and create a progressive culture that stretches beyond the school.</p>
    </div>
    <div class="row container">
    </div>
  </div>
  <div class="parallax-container">
      <div class="parallax"><img src="userPICS/New folder/downloaded pics/p2170112.jpg"></div>
  </div>
  <footer class="page-footer"  style="background-color: #2196F3; padding-bottom: 0.5px;">
      <div class="container">
        <div class="row">
          <div class="col l4 s12">
            <h5 class="white-text">Grow the Strathmore Community</h5>
            <p class="grey-text text-lighten-4">Explore what you and a Group of High Achievers can do with only your Minds. Join a Club and exude your potential Greatness.</p>
<a href="clubsdisplay.php">
    <button class="btn waves-effect waves-light blue lighten-3">Join Now
</button>
</a>
<!--</form>-->
          </div>
            <div class="col l4 s12">
            <h5 class="white-text">Join The Conversation</h5>
            <p class="grey-text text-lighten-4"> Converse With the Group Members and share important discussions while Laughing at Loud with each others social company over the Internet.</p>
            <a class="btn waves-effect waves-light blue lighten-3" target="_blank" href="chatroom.php">Chat</a>
          </div>
            <div class="col l4 s12">
            <h5 class="white-text">Club Activities</h5>
            <p class="grey-text text-lighten-4">Lots of Club Activities for you to go to. Sign up now and join your friends in the adventure!</p>
            <a class="btn waves-effect waves-light blue lighten-3" target="_blank" href="activity.php">Activities</a>
            <br><form method="post" action="clubs.php">
    <button type="submit" name="back" class="btn waves-effect waves-light blue lighten-3">Back
    </button>
                </form>
            </div>
    
    
                 <?php
if(isset($_POST['back'])){
    
$studentID = $_SESSION['userid'];

    //login for a member
    $sqlcmemberLogin = "SELECT * FROM `club_member` WHERE `Student_ID`='$studentID' AND `status` LIKE '%member%'";
    $memberresult = mysqli_query($con,$sqlcmemberLogin);
    //login for official
    $sqlcofficialLogin = "SELECT * FROM `club_member` WHERE `Student_ID`='$studentID' AND `status` LIKE '%official%'";
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
          </div>
        </div>
      </div>
    </footer>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>if (!window.jQuery) { document.write('<script src="bin/jquery-3.2.1.min.js"><\/script>'); }
    </script>
    <script src="http://materializecss.com/js/jquery.timeago.min.js"></script>
    <script src="http://materializecss.com/js/prism.js"></script>
    <script src="http://materializecss.com/jade/lunr.min.js"></script>
    <script src="http://materializecss.com/jade/search.js"></script>
    <script src="http://materializecss.com/bin/materialize.js"></script>
    <script src="http://materializecss.com/js/init.js"></script>
    
    <!-- Twitter Button -->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

    <!-- Google Plus Button-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!--  Google Analytics  -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-56218128-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
    </script>

  </body>
</html><?php ob_flush();?>
<?php
      }
      else{
          header('Location: index.php');
      }
?>
