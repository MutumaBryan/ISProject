<?php
$link= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
$output='';
$sql="SELECT * FROM `club`";
$result=  mysqli_query($link, $sql);
$output .='
        <table class="table table-bordered">
        <tr>
        <th width=5%>Club ID</th>
        <th width=40%>Club Name</th>
        <th width=15%>Club Status</th>
        <th width=5%>Deactivate</th>
        <th width=5%>Delete</th></tr>';
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .=' <tr>
        <td>'.$row["club_ID"].'</td>  
        <td class="Student_ID" data-id1="'.$row["club_ID"].'" contenteditable>'.$row["club_Name"].'</td>
        <td class="Student_Name" data-id2="'.$row["club_ID"].'" contenteditable>'.$row["club_status"].'</td>
        <td>  
        <form action="deactivate.php" method="post">
        <input type="hidden" name="delete_id" value="'.$row["club_ID"].'" />
        <button type="submit" name="btn_add" id="btn_add" style="padding: 3px;" class="btn btn-xs btn-success"><img src="PICS/icons8-checked.png" width="30"></button>
      </form></td>    
        <td><button type="button" name="delete_btn"  data-id8="'.$row["club_ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td></tr>'
    ;}
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
