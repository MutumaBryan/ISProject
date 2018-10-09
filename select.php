<?php
$link= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
$output='';
$sql="SELECT * FROM `club_member` WHERE `status` LIKE '%Official%' ORDER BY `number` ASC;";
$result=  mysqli_query($link, $sql);
$output .='
        <table class="table table-bordered">
        <tr>
        <th width=5%>Number</th>
        <th width=10%>Student ID</th>
        <th width=15%>Student Name</th>
        <th width=10%>Contacts</th>
        <th width=20%>Email Address</th>
        <th width=10%>Status</th>
        <th width=10%>Club ID</th>
        <th width=25%>Club Name</th>
        <th width=5%>Delete</th>';
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .=' <tr>
        <td>'.$row["number"].'</td>  
        <td class="Student_ID" data-id1="'.$row["number"].'" contenteditable>'.$row["Student_ID"].'</td>
        <td class="Student_Name" data-id2="'.$row["number"].'" contenteditable>'.$row["Student_Name"].'</td>
        <td class="Contacts" data-id3="'.$row["number"].'" contenteditable>'.$row["Contacts"].'</td>
        <td class="email" data-id4="'.$row["number"].'" contenteditable>'.$row["email"].'</td>
        <td class="status" data-id5="'.$row["number"].'" contenteditable>'.$row["status"].'</td>
        <td class="club_id" data-id6="'.$row["number"].'" contenteditable>'.$row["club_id"].'</td>
        <td class="Club_Name" data-id7="'.$row["number"].'" contenteditable>'.$row["Club_Name"].'</td>
        <td><button type="button" name="delete_btn"  data-id8="'.$row["number"].'" class="btn btn-xs btn-danger btn_delete">x</button></td></tr>'
    ;}
    $output .='<tr>
            <td></td>
            <td id="Student_ID" contenteditable></td>
            <td id="Student_Name" contenteditable></td>
            <td id="Contacts" contenteditable></td>
            <td id="email" type="email" contenteditable></td>
            <td id="status" contenteditable></td>
            <td id="club_id" contenteditable></td>
            <td id="Club_Name" contenteditable></td>
            <td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td></tr>';
}
else
{
    $output .='<tr>
            <td colspan="7">Data Not Found</td>
            </tr>';
    
}
$output .='</table>';
echo $output;
?>