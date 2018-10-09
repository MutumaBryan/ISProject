<?php
$link= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
$id = $_POST['Student_ID'];
$name=$_POST['Student_Name'];
$contacts=$_POST['Contacts'];
$email=$_POST['email'];
$status=$_POST['status'];
$clubid=$_POST['club_id'];
$clubname=$_POST['Club_Name'];
$query="INSERT INTO `club_member`(`Student_ID`,`Student_Name`, `Contacts`, `email`, `status`, `Club_ID`,`Club_Name`) VALUES ('$id','$name','$contacts','$email','$status','$clubid','$clubname')";
if(mysqli_query($link, $query))
{
    echo 'Data Inserted';
};
?>


