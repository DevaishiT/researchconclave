<?php
include('../config.php');

if(isset($_POST['username'])){
	
	$username = $_POST['username'];
	$topic = $_POST['topic'];
	$file = $_POST['file'];
    $grade = $_POST['grade'];
    $report = $_POST['report'];
    $type = $_POST['type'];

    if($type == 'reviewer1')
    {
        $result  = mysqli_query($db , "UPDATE posterabstracts SET username='".$username."' , topic='".$topic."' , grade1='".$grade."' ,report1='".$report."' WHERE username='".$username."'");
        if($result){
            echo 'data updated';
	}
    }
	if($type == 'reviewer2')
    {
        $result  = mysqli_query($db , "UPDATE posterabstracts SET username='".$username."' , topic='".$topic."' , grade2='".$grade."' ,report2='".$report."' WHERE username='".$username."'");
        if($result){
            echo 'data updated';
	}
    }

}
?>