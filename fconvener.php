<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> to fconvener home page.</h1> 
      <a href ="post_notifications.php">Post Notifications</a><br>
      <a href ="#">Approve reviewers for poster abstracts</a><br>
      <a href ="#">Approve reviewers for oral abstracts</a><br>
      <a href ="#">View Grades</a>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
<?php
   include('noticeboard.php');
?>