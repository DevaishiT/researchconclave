<?php

    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        $sql = "SELECT * from users where username = '".$myusername."' and password = '".$mypassword."'";
        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['login_user'] = $myusername;
            $_SESSION['user_type'] = $row['type'];
            if($row['type']=="fconvener")
            {
                header("location: fconvener.php");
            }
            else if($row['type']=="sconvener")
            {
                header("location: sconvener.php");
            }
            else if($row['type']=="reviewer")
            {
                header("location: reviewer.php");
            }
            else if($row['type']=="participant")
            {
                header("location: participant.php");
            }
            
         }else {
            $error = "Your Login Name or Password is invalid";
            echo $error."<br>";
         }
    }

?>


<html>
<head>
    <title>login page</title>
</head>
<body>
    <form action="" method="POST">
        <p>
            <label>Username:</label>
            <input type="text" id="username" name="username" />
        </p>
        <p>
            <label>Password:</label>
            <input type="password" id="password" name="password" />
        </p>
        <p>
            <input type="submit" value="Login" />
        </p>
        <p>
            <a href="signup.php">New Participant? Register here!</a>
        </p>
    </form>
</body>
</html>