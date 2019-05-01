<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> to the sconvener homepage.</h1> 
      <a href ="post_notifications.php">Post Notifications</a><br>
      <a href ="sconvener/allot_reviewer.php">Allot reviewers for poster presentation</a><br>
      <a href ="sconvener/allot_reviewer_oral.php">Allot reviewers for oral presentation</a>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

<?php

    include('noticeboard.php');

?>