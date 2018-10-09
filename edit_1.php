<?php
$link= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
 $id = $_POST['id'];  
 $text = $_POST['text'];  
 $column_name = $_POST['column_name'];  
 $sql = "UPDATE `club_member` SET `$column_name` ='$text' WHERE `number`='$id'";  
 if(mysqli_query($link, $sql))  
 {  
      echo 'Data Updated';  
 } 
 if (!mysqli_query($link,$sql))
  {
  echo("Error description: " . mysqli_error($link));
  }
 ?>