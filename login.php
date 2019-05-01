<?php

    include("config.php");
    session_start();
    //echo "<link href='style.css' rel='stylesheet' type='text/css'>";
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
            echo "<p class='errorMsg'>".$error."</p><br>";
         }
    }

?>


<html>
<head>
    <title>login page</title>
    <link href="css/loginstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Log In </h2>
            <h2 class="inactive underlineHover"><a href="signup.php">Sign Up </a></h2>
            <form action="" method="POST">
            <!--<p>
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
            </p> -->
            <input type="text" id="username" class="fadeIn first" name="username" placeholder="username">
            <input type="password" id="password" class="fadeIn second" name="password" placeholder="password">
            <input type="submit" class="fadeIn third" value="Log In">
            </form> 

            <div id="formFooter">
                <a class="underlineHover" href="signup.php">New Participant? Register here!</a>
            </div>
        </div>
    </div>
</body>
</html>