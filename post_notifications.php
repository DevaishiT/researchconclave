<?php
   include('session.php');

   $mydate=getdate(date("U"));
   $today = $mydate['month'] . " " . $mydate['mday'] .", ". $mydate['year'];

   if(isset($_POST["submit"]))
   {
       $title = $_POST["title"];
       $description = $_POST["description"];

       echo $title . $description;

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
</head>
<body>
    <form action="" method="post">
        <p>
            <label>Title:</label>
            <input type="text" id="title" name="title" />
        </p>
        <p>
            <textarea name="description" cols="40" rows="4" placeholder="Description goes here"></textarea>
        </p>
        <p>
            <input type="submit" value="Submit" name="submit"/>
        </p>
    </form>
</body>
</html>