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
        <title>Official</title>
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
        <a class="navbar-brand" href="Official.php">
            <div class="erclogo"><img src='userPICS/Capture.PNG' width='240' height='100' style="margin-top: -18px; margin-left: -19px;
                 height: 76.5px; border-bottom-right-radius: 3%; border-top-right-radius: 5%; border-bottom-left-radius: 5%;">
        </div></a>
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="Official.php">Home</a></li>
        <li><a href="clubs.php">Clubs</a></li>
      <li class="navbar navbar-right"><a href="Adminstrator.php">Club Management</a></li>
    </ul>
      
  </div>
</nav>
</div>
    
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Clubs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <style>
            * {
	margin: 0;
	padding: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

body {
	background: #2d2c41;
	font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
}

ul {
	list-style-type: none;
}

a {
	color: #b63b4d;
	text-decoration: none;
}

/** =======================
 * Contenedor Principal
 ===========================*/
h1 {
 	color: #FFF;
 	font-size: 24px;
 	font-weight: 400;
 	text-align: center;
 	margin-top: 80px;
 }

h1 a {
 	color: #c12c42;
 	font-size: 16px;
 }

 .accordion {
 	width: 100%;
 	max-width: 360px;
 	margin: 30px auto 20px;
 	background: #FFF;
 	-webkit-border-radius: 4px;
 	-moz-border-radius: 4px;
 	border-radius: 4px;
 }

.accordion .link {
	cursor: pointer;
	display: block;
	padding: 15px 15px 15px 42px;
	color: #4D4D4D;
	font-size: 14px;
	font-weight: 700;
	border-bottom: 1px solid #CCC;
	position: relative;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li:last-child .link {
	border-bottom: 0;
}

.accordion li i {
	position: absolute;
	top: 16px;
	left: 12px;
	font-size: 18px;
	color: #595959;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
	right: 12px;
	left: auto;
	font-size: 16px;
}

.accordion li.open .link {
	color: #b63b4d;
}

.accordion li.open i {
	color: #b63b4d;
}
.accordion li.open i.fa-chevron-down {
	-webkit-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	transform: rotate(180deg);
}

.accordion li.default .submenu {display: block;}
/**
 * Submenu
 -----------------------------*/
 .submenu {
 	display: none;
 	background: #444359;
 	font-size: 14px;
 }

 .submenu li {
 	border-bottom: 1px solid #4b4a5e;
 }

 .submenu a {
 	display: block;
 	text-decoration: none;
 	color: #d9d9d9;
 	padding: 12px;
 	padding-left: 42px;
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .submenu a:hover {
 	background: #b63b4d;
 	color: #FFF;
 }
 
 #contact {
        -webkit-user-select: none; /* Chrome/Safari */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+ */
        width: 100%;
 	background: #444359;
 	font-size: 14px;
        line-height: 30px;
        cursor: pointer;
  	border-bottom: 1px solid #4b4a5e;
	display: block;
	padding: 10px 10px 10px 30px;
        color: #d9d9d9;
}

#contact:hover {
  background: #b63b4d;
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

.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}
label {
	cursor: pointer; 
}

        </style>
        </head>
    <body>

	<h1 style="color: black;">Manage Club</h1>
	<!-- Contenedor -->
	<ul id="accordion" class="accordion">
		<li>
			<div class="link"><i class="glyphicon glyphicon-tent"></i>Club Activities<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
                            <li><a href="officialevents.php">Events</a></li>
                            <li><a href="officialeventsattendance.php">Attendance</a></li>
			</ul>
		</li>
		<li>
			<div class="link"><i class="glyphicon glyphicon-briefcase"></i>Manage Club<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
                            <li><a href="addremoveofficial.php">Add or Remove Club Member</a></li>
			</ul>
		</li>
		<li>
			<div class="link"><i class="glyphicon glyphicon-list-alt"></i>Club Details<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
                            <li><a href="officialmembers.php">Club Members</a></li>
		            <li><a href="officialmeetings.php">Club Meetings</a></li>
			</ul>
		</li>
                <li>
                    <div class="link"><i class="glyphicon glyphicon-cog"></i>Settings<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><div id='contact'>Change Club Image</div></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
		</li>
	</ul>  
        <div id='contactForm'>    
<!--    <link rel="shortcut icon" type="image/x-icon" href="pictures/Kenya_Police_Flag.gif"/>-->
        <h3>Club Profile Picture</h3>
        <div class="content">
                    <section>
                        <form action="clubOfficial.php" method="POST" name="evForm" enctype="multipart/form-data">
                        <label for="file">Choose a Image
                        <input type="file" id="file" name="image" accept="image/*" class="inputfile"><br>
                        </label>
                        <hr><br>
                        <input class="btn btn-7h" name="submit" type="submit" value="ATTACH" />
                    </form>
                </section>
        </div>
        </div>

<?php
if(isset($_POST["submit"])) {
    
$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

    $club=$_SESSION['club_id'];
    $updateimage = "UPDATE `club` SET `club_img`= '$target_file' WHERE `club_ID`='$club';" ;
    mysqli_query($con, $updateimage);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "<script> alert('The file ". basename( $_FILES["image"]["name"]). " has been uploaded.');</script>";
            } else {
                echo "<script> alert('Sorry, there was an error uploading your file.');</script>";
            }
}
?>
            <!--  code for the javascript-->
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
		</script>    </body>
</html>
<script>
    $(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
</script>
<?php
      }
      else{
          header('Location: index.php');
      }
?>
