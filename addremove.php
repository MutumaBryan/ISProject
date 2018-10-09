<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrator</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
 <body class="parallax-demo">
      <header>
        <nav style="background-color: #2196F3; height: 70px;">
          <div class="container">
            <div class="nav-wrapper"style="margin-top: 10px;">
                <a href="clubs.php" class="brand-logo" style="font-size: 35px; color: white;" >Clubs and Societies</a>
            </div>
          </div>
        </nav>
      </header>
<?php
$link= mysqli_connect('localhost', 'root', '', 'is_project_one');
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <br/>
          <br/>
          <br/>
          <div class="table-responsive">
              <h3 align="center">Manage Officials</h3><br />
              <div id="live_data">
                  
              </div>
          </div>
          <a href="Adminstrator.php"><button type="submit" name="submit2" class="btn btn-danger">Back</button></a>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>


<script>
    $(document).ready(function(){
        function fetch_data()
        {
            $.ajax
            ({
                url:"select.php",
                method:"POST",
                success:function(data){
                    $('#live_data').html(data);
                }
            });
        }
        fetch_data();
        $(document).on('click','#btn_add',function(){
            var Student_ID =$('#Student_ID').text();
            var Student_Name =$('#Student_Name').text();
            var Contacts =$('#Contacts').text();
            var email =$('#email').text();
            var re = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            var emailValue = email.value;
            var testEmail = re.test(emailValue);
            var club_id =$('#club_id').text();
            var status =$('#status').text();
            var Club_Name=$('#Club_Name').text();
            if(Student_ID === '')
            {
                alert("Enter Student ID");
                return false;
            }
            if(Student_Name === '')
            {
                alert("Enter Student Name");
                return false;
            }
            if(Contacts === '')
            {
                alert("Enter Contact Details");
                return false;
            }
            if(email === '')
            {
                alert("Enter  a valid Email address");
                return false;
            }
            if(status === '')
            {
                alert("Enter Member's Status");
                return false;
            }
            if(club_id === '')
            {
                alert("Enter Club's ID");
                return false;
            }
            if(Club_Name === '')
            {
                alert("Enter Club's Name");
                return false;
            }
            $.ajax({
                url:"insert.php",
                method:"POST",
                data:{Student_ID:Student_ID, Student_Name:Student_Name, Contacts:Contacts, email:email, status:status, club_id:club_id, Club_Name:Club_Name},
                dataType:"text",
                success:function(data){
                    alert(data);
                    fetch_data();
                }
            });
        });
        function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data); 
                     fetch_data();
                }  
           });  
      }
      $(document).on('blur', '.Student_ID', function(){  
           var id = $(this).data("id1");  
           var Student_ID = $(this).text();  
           edit_data(id, Student_ID, "Student_ID");  
      });  
      $(document).on('blur', '.Student_Name', function(){  
           var id = $(this).data("id2");  
           var Student_Name = $(this).text();  
           edit_data(id,Student_Name, "Student_Name");  
      });
      $(document).on('blur', '.Contacts', function(){  
           var id = $(this).data("id3");  
           var Contacts = $(this).text();  
           edit_data(id,Contacts, "Contacts");  
      });
      $(document).on('blur', '.email', function(){  
           var id = $(this).data("id4");  
           var email = $(this).text();  
           edit_data(id,email, "email");  
      });
      $(document).on('blur', '.status', function(){  
           var id = $(this).data("id5");  
           var status = $(this).text();  
           edit_data(id,status, "status");  
      });
      $(document).on('blur', '.club_id', function(){  
           var id = $(this).data("id6");  
           var club_id = $(this).text();  
           edit_data(id,club_id, "club_id");  
      });
      $(document).on('blur', '.Club_Name', function(){  
           var id = $(this).data("id7");  
           var Club_Name = $(this).text();  
           edit_data(id,Club_Name, "Club_Name");  
      });
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id8");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
    });
    </script>