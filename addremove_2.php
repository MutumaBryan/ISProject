<html>
    <head>
        <meta charset="UTF-8">
        <title>Clubs</title>
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
              <h3 align="center">Manage Clubs</h3><br />
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
                url:"select_2.php",
                method:"POST",
                success:function(data){
                    $('#live_data').html(data);
                }
            });
        }
        fetch_data();
        function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit_2.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data); 
                     fetch_data();
                }  
           });  
      }
        
      $(document).on('blur', '.club_Name', function(){  
           var id = $(this).data("id1");  
           var Student_ID = $(this).text();  
           edit_data(id, Student_ID, "club_Name");  
      });
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id8");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_2.php",  
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