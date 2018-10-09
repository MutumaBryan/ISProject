<?php
 session_start();
 unset($_SESSION['username']);
 echo '';
 
 if(session_destroy())
 {
  header("Location: index.php");
 }
?>