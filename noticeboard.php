<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <br><br><br>
  <h3  style="text-align:center"> NOTICE BOARD </h3>
  <br><br>
<div class="card-columns" style="text-align:center">
<?php

    $sql = "SELECT * from notifications";
    $result = mysqli_query($db,$sql);

    if(! $result ) {
        die('Could not get data: ' . mysql_error());
    }

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
?>
    <div class="card bg-info" style="width: 20rem;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['title']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Posted by: <?php echo $row['username']; ?></h6>
        <h6 class="card-subtitle mb-2 text-muted">Posted on: <?php echo $row['postdate']; ?></h6>
        <p class="card-text"><?php echo $row['postdescription']; ?></p>
      </div>
    </div>
<?php
    }

?>
</div>
</body>