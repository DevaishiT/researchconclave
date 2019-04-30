<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> to the participant homepage.</h1>
      <a href = "participant/postersubmit.php">Submit abstract for poster presentation</a><br>
      <a href = "participant/oralsubmission.php">Submit abstract for oral presentation</a><br> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

<?php

    include('noticeboard.php');

?>