<?php
include('../config.php');

if(isset($_POST['username'])){
	
	$username = $_POST['username'];
	$topic = $_POST['topic'];
	$reviewer1 = $_POST['reviewer1'];
	$reviewer2 = $_POST['reviewer2'];

	//  query to update data 
	 
	$result  = mysqli_query($db , "UPDATE posterabstracts SET username='".$username."' , topic='".$topic."' , reviewer1 = '".$reviewer1."', reviewer2 = '".$reviewer2."', reviewapp='Approved' WHERE username='".$username."'");
	if($result){
		echo 'data updated';
	}

}
?>