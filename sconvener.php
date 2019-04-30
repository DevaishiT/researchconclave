<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> to the sconvener homepage.</h1> 
      <a href ="post_notifications.php">Post Notifications</a>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

<?php

    include('noticeboard.php');

?>