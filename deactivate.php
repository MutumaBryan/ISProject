<?php
$link= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
 $id = (isset($_POST['delete_id']) ? $_POST['delete_id'] : '');  
 $sql="SELECT * FROM `club` WHERE `club_ID` ='$id'";
 $result=mysqli_query($link,$sql);
 while($row = mysqli_fetch_array($result)){
     $text=$row['club_status'];
     if($text=='active'){
     $sq = "UPDATE `club` SET `club_status` ='Inactive' WHERE `club_ID`='$id'";
     mysqli_query($link,$sq);
     echo 'Data Updated';
     header('Location: addremove_2.php'); 
      if (!mysqli_query($link,$sql))
         {
     echo("Error description: " . mysqli_error($link));
         }
 }else
        {
            $sq = "UPDATE `club` SET `club_status` ='active' WHERE `club_ID`='$id'";
            mysqli_query($link,$sq);
            echo 'Data Updated';
            header('Location: addremove_2.php');
        }
 }
 ?>