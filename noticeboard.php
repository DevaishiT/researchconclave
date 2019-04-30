<?php

    $sql = "SELECT * from notifications";
    $result = mysqli_query($db,$sql);

    if(! $result ) {
        die('Could not get data: ' . mysql_error());
    }

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "Date posted: ".$row['postdate']."<br>"
            ."Posted by:".$row['username']."<br>"
            ."<h3>".$row['title']."</h3>"
            .$row['postdescription']."<br><br>";

    }

?>