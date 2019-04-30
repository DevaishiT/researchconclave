<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $query = "SELECT username from users where username = '".$user_check."'";
   $ses_sql = mysqli_query($db,$query);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $usertype = $_SESSION['user_type'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>