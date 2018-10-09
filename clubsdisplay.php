<?php
 //variables
    $Host_Name = 'localhost';
    $Database_User = 'root';
    $Password = '';
    $Database_name = 'is_project_one';
   
    //connection
    $con = mysqli_connect($Host_Name, $Database_User, $Password, $Database_name);
    ?>
<?php 
      session_start();
      if(!empty($_SESSION['username']))
      {
      ?>
<!DOCTYPE html>
<html>
<head>
	<title>Clubs List</title><!--CSS plugin pages-->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
	<link href="UsersCSS/clubsdisplaycss.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://materializecss.com/css/prism.css" rel="stylesheet">
	<link href="http://materializecss.com/css/ghpages-materialize.css" media="screen,projection" rel="stylesheet" type="text/css"><!--JQuery plugin pages-->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript">
	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
	</script>
	<script src="http://malsup.github.com/jquery.cycle.all.js" type="text/javascript">
	</script>
</head>
<body class="parallax-demo">
	<header>
		<nav style="background-color: #2196F3;">
			<div class="container">
				<div class="nav-wrapper">
					<a class="brand-logo" href="clubs.php">Clubs and Societies</a>
				</div>
			</div>
		</nav>
	</header><br>
	<!--      bootstrap for the list and grid view-->
	<div class="main" id="main">
		<div class="container">
			<div class="well well-sm">
				<strong>VIEW</strong>
				<div class="btn-group">
					<a class="btn btn-default btn-sm" href="#" id="list"><span class="glyphicon glyphicon-th-list"></span>LIST</a> <a class="btn btn-default btn-sm" href="#" id="grid"><span class="glyphicon glyphicon-th"></span>GRID</a>
				</div><a href="clubs.php"><button class="btn btn-danger" name="submit2" style="float:right;" type="submit">Back</button></a>
			</div>
			<div class="row list-group" id="products">
				<!--        php code for the displaying the data-->
				<?php
				//code for sql selecting club member login table
				$sqlclub = "SELECT * FROM `club` WHERE club_status = 'active'";
				$clubresult = mysqli_query($con,$sqlclub);
				//the loop for selecting every club
				while ($row = mysqli_fetch_array($clubresult, MYSQLI_BOTH))
				{
				    $clubID = $row['club_ID'];
				    $clubName = $row['club_Name'];
				    $clubStatus = $row['club_status'];
                                    $club_description = $row['club_description'];
                                    $club_Img = $row['club_img'];
				//    echo " " . $clubID . " || " . $clubName . " || " . $clubStatus . " || <br>" ;
				    echo "<div class='item  col-xs-4 col-lg-4' style = 'height: 500px; margin-bottom: 90px;'>"
				    . "<div class='thumbnail' style='border-radius: 10px;'>"
				            . "<img class='group list-group-image' src='$club_Img' alt=''  style='width: 400px; height: 250px; border-top-left-radius: 10px"
				            . "; border-top-right-radius: 10px;'/>"
				            . "<div class='caption' >"
				            . "<h5 class='group inner list-group-item-heading' style = 'color: #2196F3; height: 90px; overflow-y: hidden;'>"
				            . "$clubName</h5>"
				            . "<p class='group inner list-group-item-text' style = 'overflow-x: hidden; overflow-y: scroll; height: 100px;'>";
				            echo $club_description; echo"</p><hr><br>"
				            . "<div class='row'>"
				            . "<div class='col-xs-12 col-md-6'>"
				            . "<p class='lead'>"
				            . "Join Request</p>"
				            . "</div>"
				            . "<div class='col-xs-12 col-md-6'>"
				            . "<form action='clubsdisplay.php' method='post'>
        <input type='hidden' name='delete_id' value='$clubID' />
        <button type='submit' name='btn_add' id='btn_add' class='btn btn-xs btn-success'>Join</button>
      </form></div>"
				            . "</div>"
				            . "</div>"
				            . "</div>"
				            . "</div>";
				}
                                if(isset($_POST['btn_add']))
                                {
                                    $id = (isset($_POST['delete_id']) ? $_POST['delete_id'] : '');
                                    $sid=$_SESSION['userid'];
                                    $sql="SELECT * FROM `club` WHERE `club_ID` ='$id'";
                                    $res=mysqli_query($con,$sql);
                                    while ($row1 = mysqli_fetch_array($res)) {
                                     $cl=$row1['club_ID'];
                                     $name=$row1['club_Name'];
                                    $studentclub=$_SESSION['club_id'];
                                    $query="SELECT * FROM `club_member` WHERE `club_id`='$id' AND `Student_ID`='$sid'";
                                    $result=mysqli_query($con,$query);
                                    if(mysqli_num_rows($result)==1)
                                    {
                                        echo "<script>"
                                        . "alert('Oops,seems you already a member');"
                                        . "</script>";
                                    } else {
                                        $user=$_SESSION['username'];
                                        $sid=$_SESSION['userid'];
                                    $s="INSERT INTO `club_member`(`Student_ID`, `Student_Name`,`status`, `club_id`, `Club_Name`) VALUES ('$sid','$user','Member','$cl','$name')";
                                    mysqli_query($con, $s);
                                    echo "<script>"
                                        . "alert('Welcome to $name');"
                                        . "</script>";
                                    }
                                    }  
                                }
				?>
				
			</div>
		</div><!--  code for the javascript-->
		<script type="text/javascript">
		  $(document).ready(function() {
		  $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
		  $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
		});

		
		</script>
	</div>
</body>
</html>
<?php
      }
      else{
          header('Location: index.php');
      }
?>
