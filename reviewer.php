<?php
   include('session.php');
   $sql= "SELECT * from reviewer_type where username ='".$login_session."'"; 
      $result=mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $link = 'reviewer/review_'.$row['type'].'.php';
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> to the reviewer homepage.</h1> 
      <a href = "logout.php">Sign Out</a><br>
      <a href = "<?php echo $link; ?>">Review abstracts</a><br><br><br>
   </body>
   
</html>
<?php
   include('noticeboard.php');
?>