<?php
   include('../session.php');
?>
<html>
   
   <head>
      <title>View Grades</title>

      <title>Homepage </title>
      <script>
         addEventListener("load", function() {
               setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
               window.scrollTo(0, 1);
         }
      </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="../css/tablestyle.css">

      <link rel="stylesheet" href="../css/bootstrap.css">
      <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
      <link href="../css/font-awesome.css" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700" rel="stylesheet">
   </head>

   
   <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">
            <div class="top d-md-flex text-center">
               <h1> <a allign="center" href="../fconvener.php">Research Conclave</a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li><a href="../fconvener.php">Home</a></li>
                    <li><a href="../post_notifications.php">Post Notifications</a></li>
                    <li>
                        
                        <label for="drop-2" class="toggle">Dropdown 
                        </label>
                        <a href="approve_reviewers.php">Approve reviewers</a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                            <li><a href="approve_reviewers.php" class="drop-text">Poster Presentation</a></li>
                            <li><a href="approve_reviewers_oral.php" class="drop-text">Oral Presentation</a></li>
                        </ul>
                     </li>

                    <li class="active"><a href="view_grades.php">View Grades</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
           
        </div>
    </header> 
   
   <body>
   <div class="table-users">
        <div class="header">Poster Abstract</div>
        <table cellspacing="0" style="text-align:center">            
        <thead>
                <tr>
                <th>Serial</th>
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
                    <td><?php echo $row['count']; ?></td>
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
                </div>


      <div class="table-users">
        <div class="header">Oral Abstract</div>
        <table cellspacing="0" style="text-align:center">
            <thead>
                <tr>
                <th>Serial</th>
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
                    <td><?php echo $row['count']; ?></td>
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
                </div>
   </body>
   
</html>