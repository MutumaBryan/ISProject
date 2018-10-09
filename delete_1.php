<?php
$link= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
 $sql = "DELETE FROM `club_member` WHERE `number` = '".$_POST["id"]."'";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>