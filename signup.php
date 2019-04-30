<?php

    include("config.php");
    $err_msg = "";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username = $_POST["username"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $password = $_POST["password"];
        $repassword = $_POST["password2"];

        if($username == "" || $fname == "" || $lname == "" || $password == "" || $repassword =="")
        {
            $err_msg = "Please enter all the fiels.";
        }

        $sql = "SELECT * from users where username = '".$_POST['username']."'";
        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if($count > 0 && $err_msg == "")
        {
            $err_msg = "Username already in use.";
        }

        if(($password != $repassword) && $err_msg == "")
        {
            $err_msg = $password . $repassword;
        }

        if($err_msg == "")
        {
            $sql = "INSERT into users (username,password,firstname,lastname,type) VALUES ('".$username."','".$password."','".$fname."','".$lname."','participant')";
            $result = mysqli_query($db,$sql);
            $message = "Registration successful. Login to continue.";
            echo "<script type='text/javascript'>";
            echo "alert('".$message."');";
            echo "window.location.href = 'login.php';";
            echo "</script>";
        }
        else
        {
            echo "<script type='text/javascript'>";
            echo "alert('".$err_msg."');";
            echo "</script>";
        }
    }

?>
<html>
<head>
    <title>signup</title>
</head>
<body>
    <form action="" method="POST">
        <p>First Name:</label>
            <input type="text" id="firstname" name="firstname" />
        </p>
        <p>
            <label>Last Name:</label>
            <input type="text" id="lastname" name="lastname" />
        </p>
        <p>
            <label>Username:</label>
            <input type="text" id="username" name="username" />
        </p>
        <p>
            <label>Password:</label>
            <input type="text" id="password" name="password" />
        </p>
        <p>
            <label>Re-enter Password:</label>
            <input type="text" id="password2" name="password2" />
        </p>
        <p>
            <input type="submit" value="SignUp" />
        </p>
    </form>
</body>
</html>