<?php
   include('../session.php');
   include('../deadline.php');

   $today = strtotime("now");

   if(!($today >= strtotime($postersubmission_startdate) && $today <= strtotime($postersubmission_enddate)))
   {
        echo "<h2 class='active'>Date of submission has passed. Contact concerned authorities in case you think it is a mistake.</h2><br>";
        die();
   }

   $sql = "SELECT * from tableofcounts";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

   $postercount = $row['postercount'];
   $postercount = $postercount +1;

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
                $sql = "INSERT into posterabstracts (count,username,email,topic,fileename,reviewer1,reviewer2) VALUES ('POSTER".$postercount."','".$login_session."','".$email."','".$topic."','".$target_file."','Not Alloted','Not Alloted')";
                $result = mysqli_query($db,$sql);
                $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $sql = "UPDATE tableofcounts SET postercount = '".$postercount."'";
                $result = mysqli_query($db,$sql);
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
      <script>
         addEventListener("load", function() {
               setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
               window.scrollTo(0, 1);
         }
      </script>
       <link href="../css/loginstyle.css" rel="stylesheet" type="text/css">

      <link rel="stylesheet" href="../css/bootstrap.css">
      <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
      <link href="../css/font-awesome.css" rel="stylesheet" type="text/css" media="all">
      <link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700" rel="stylesheet">
   </head>
   
   <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">
            <div class="top d-md-flex text-center">
               <h1> <a allign="center" href="../participant.php">Research Conclave</a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li class="active"><a href="../participant.php">Home</a></li>
                    <li>
                        
                        <label for="drop-2" class="toggle">Dropdown  <span class="fa fa-angle-down" aria-hidden="true"></span>
                        </label>
                        <a href="#">Submit Abstract <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                            <li><a href="postersubmit.php" class="drop-text">Poster Presentation</a></li>
                            <li><a href="oralsubmission.php" class="drop-text">Oral Presentation</a></li>
                        </ul>
                     </li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
           
        </div>
    </header> 
   
   <body>
   <div class="wrapper ">
        <div id="formContent">
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
        </div></div>
      
   </body>
   
</html>