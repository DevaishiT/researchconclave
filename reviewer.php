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
               <h1> <a allign="center" href="reviewer.php">Research Conclave</a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li class="active"><a href="reviewer.php">Home</a></li>
                    <li><a href="<?php echo $link; ?>">Review Abstracts</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
   
</html>
<?php
   include('noticeboard.php');
?>