<?php
   include('session.php');
   $sql= "SELECT * from tableofcounts";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

   $review = $row['reviewflag'];

   if($review == 0)
   {
       echo "<h3>Review process is still going on. Come back later.</h3>";
   }
   else
   {
        $sql= "SELECT * from tableofcounts";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<h3>Poster Abstracts:</h3>
      <table>
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Username</th>
                    <th>Topic</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * from posterabstracts";
                $result = mysqli_query($db,$sql); 
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $row['count']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['topic']; ?></td>
                        <td><a href="<?php echo $row['fileename']; ?>">Click here!</a></td>
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
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * from oralabstracts";
                $result = mysqli_query($db,$sql); 
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $row['count']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['topic']; ?></td>
                        <td><a href="<?php echo $row['fileename']; ?>">Click here!</a></td>
                        
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

<?php
   }
?>