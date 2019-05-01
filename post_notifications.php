<?php
   include('session.php');

   $mydate=getdate(date("U"));
   $today = $mydate['month'] . " " . $mydate['mday'] .", ". $mydate['year'];

   if(isset($_POST["submit"]))
   {
       $title = $_POST["title"];
       $description = $_POST["description"];

       if($title != "" && $description != "")
       {
            $sql = "INSERT into notifications (username,postdate,title,postdescription) VALUES ('".$login_session."','".$today."','".$title."','".$description."')";
            $result = mysqli_query($db,$sql);
            $message = "Notification has been posted successfully";
            echo "<script type='text/javascript'>";
            echo "alert('".$message."');";
            echo "window.location.href = '".$usertype.".php';";
            echo "</script>";
       }

       else{
           echo "Both title and description are needed.";
       }
   }

?>
<html>
<head>
    <title>Post Notifications</title>

    <script>
         addEventListener("load", function() {
               setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
               window.scrollTo(0, 1);
         }
      </script>

<link href="css/loginstyle.css" rel="stylesheet" type="text/css">

      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700" rel="stylesheet">
   
</head>
<?php
if ($usertype == "fconvener") {
?>
   <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">
            <div class="top d-md-flex text-center">
               <h1> <a allign="center" href="fconvener.php">Research Conclave</a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li><a href="fconvener.php">Home</a></li>
                    <li class="active"><a href="post_notifications.php">Post Notifications</a></li>
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

                    <li><a href="#">View Grades</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
           
        </div>
    </header> 
<?php
}
?>

<?php 
if ($usertype == "sconvener") {
?>
       <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">
            <div class="top d-md-flex text-center">
               <h1> <a allign="center" href="sconvener.php">Research Conclave</a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li><a href="sconvener.php">Home</a></li>
                    <li class="active"><a href="post_notifications.php">Post Notifications</a></li>
                    <li>
                        
                        <label for="drop-2" class="toggle">Dropdown 
                        </label>
                        <a href="sconvener/allot_reviewer.php">Allot reviewers</a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                            <li><a href="sconvener/allot_reviewer.php" class="drop-text">Poster Presentation</a></li>
                            <li><a href="sconvener/allot_reviewer_oral.php" class="drop-text">Oral Presentation</a></li>
                        </ul>
                     </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header> 
<?php
}
?>

<body>
<div class="wrapper">
<div id="formContent">   
<form action="" method="post">
        <p>
            <input type="text" id="title" placeholder="Title goes here" name="title" />
        </p>
        <p>
            <textarea name="description" cols="40" rows="4" placeholder="Description goes here"></textarea>
        </p>
        <p>
            <input type="submit" value="Submit" name="submit"/>
        </p>
    </form>
</div></div>
</body>
</html>