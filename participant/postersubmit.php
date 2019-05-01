<?php
   include('../session.php');
   include('../deadline.php');

   $today = strtotime("now");

   if(!($today >= strtotime($postersubmission_startdate) && $today <= strtotime($postersubmission_enddate)))
   {
        echo "Date of submission has passed. Contact concerned authorities in case you think it is a mistake.<br>";
        die();
   }

   if(isset($_POST["submit"])){
        $target_dir = "../uploads_poster/";
        $target_file = $target_dir . $login_session . "-" . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $topic = $_POST["topic"];
        $email = $_POST["email"];
        
        $message = "";
        // Check if file already exists
        $sql = "SELECT * from posterabstracts where username = '".$login_session."'";
        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if($count>0)
        {
            $message = "Sorry, file already exists.";
            $uploadOk = 0;
        }
            
        // Check file size
        else if ($_FILES["fileToUpload"]["size"] > 500000) {
            $message = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        else if($FileType != "pdf") {
            $message = "Sorry, only pdf files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message = $message . " Your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $sql = "INSERT into posterabstracts (username,email,topic,fileename,reviewer1,reviewer2) VALUES ('".$login_session."','".$email."','".$topic."','".$target_file."','Not Alloted','Not Alloted')";
                $result = mysqli_query($db,$sql);
                $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        }
        echo "<script type='text/javascript'>";
        echo "alert('".$message."');";
        echo "window.location.href = '../participant.php';";
        echo "</script>";
   }
   

?>
<html>
   
   <head>
      <title>Abstract submission for poster presentation</title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> to the poster submissiopn homepage.</h1> 
      <form action="" method="post" enctype="multipart/form-data">
        <p>
            <label>Topic:</label>
            <input type="text" id="topic" name="topic" />
        </p>
        <p>
            <label>Email:</label>
            <input type="text" id="email" name="email" />
        </p>
        <p>
            Select file to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
        </p>
        <input type="submit" value="Upload Abstract" name="submit">
       </form>
      <h2><a href = "../logout.php">Sign Out</a></h2>
      
   </body>
   
</html>