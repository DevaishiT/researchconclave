<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Homepage </title>
      <script>
         addEventListener("load", function() {
               setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
               window.scrollTo(0, 1);
         }
      </script>

      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700" rel="stylesheet">
   
   </head>

   <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">
            <div class="top d-md-flex text-center">
               <h1> <a allign="center" href="fconvener.php">Research Conclave</a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li class="active"><a href="fconvener.php">Home</a></li>
                    <li><a href="post_notifications.php">Post Notifications</a></li>
                    <li>
                        
                        <label for="drop-2" class="toggle">Dropdown 
                        </label>
                        <a href="fconvener/approve_reviewers.php">Approve reviewers</a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                            <li><a href="fconvener/approve_reviewers.php" class="drop-text">Poster Presentation</a></li>
                            <li><a href="fconvener/approve_reviewers_oral.php" class="drop-text">Oral Presentation</a></li>
                        </ul>
                     </li>

                    <li><a href="fconvener/view_grades.php">View Grades</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
           
        </div>
    </header> 
   
</html>
<?php
   include('noticeboard.php');
?>