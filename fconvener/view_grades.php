<?php
   include('../session.php');
?>
<html>
   
   <head>
      <title>View Grades</title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?> to view grades page.</h1> 
      <h3>Poster Abstracts:</h3>
      <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Topic</th>
                    <th>Download</th>
                    <th>Reviewer 1</th>
                    <th>Reviewer 2</th>
                    <th>Average Grade</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * from posterabstracts";
                $result = mysqli_query($db,$sql); 
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                    <tr id="<?php echo $row['username']; ?>">
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['topic']; ?></td>
                        <td><a href="<?php echo $row['fileename']; ?>">Click here!</a></td>
                        <td><?php echo $row['reviewer1']; ?></td>
                        <td><?php echo $row['reviewer2']; ?></td>
                        <td><?php echo ($row['grade1']+$row['grade2'])/2; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
      <h3>Oral Abstracts:</h3>
      <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Topic</th>
                    <th>Download</th>
                    <th>Reviewer 1</th>
                    <th>Reviewer 2</th>
                    <th>Average Grade</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * from oralabstracts";
                $result = mysqli_query($db,$sql); 
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                    <tr id="<?php echo $row['username']; ?>">
                        <td data-target="username"><?php echo $row['username']; ?></td>
                        <td data-target="topic"><?php echo $row['topic']; ?></td>
                        <td data-target="topic"><a href="<?php echo $row['fileename']; ?>">Click here!</a></td>
                        <td data-target="reviewer1"><?php echo $row['reviewer1']; ?></td>
                        <td data-target="reviewer2"><?php echo $row['reviewer2']; ?></td>
                        <td data-target="grade"><?php echo ($row['grade1']+$row['grade2'])/2; ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

   </body>
   
</html>