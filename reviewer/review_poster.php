<?php
   include('../session.php');
?>
<html>
   
   <head>
      <title>Review and grade</title>

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

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
   
   <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">
            <div class="top d-md-flex text-center">
               <h1> <a allign="center" href="../reviewer.php"><b>Research Conclave</b></a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li ><a href="../reviewer.php">Home</a></li>
                    <li class="active"><a href="review_poster.php">Review Abstracts</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

   <body>
   <div class="table-users">
        <div class="header">Reviewer Allotment</div>
        <table cellspacing="0" style="text-align:center">
            <thead>
                <tr>
                <th>Serial</th>
                    <th>Username</th>
                    <th>Topic</th>
                    <th>Download</th>
                    <th>Grade</th>
                    <th>Action</th>
                    <th style="display:none;">Report</th>
                    <th style="display:none;">Type</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * from posterabstracts where reviewer1='".$login_session."'";
                $result = mysqli_query($db,$sql); 
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                     <tr id="<?php echo $row['username']; ?>">
                     <td><?php echo $row['count']; ?></td>
                        <td data-target="username"><?php echo $row['username']; ?></td>
                        <td data-target="topic"><?php echo $row['topic']; ?></td>
                        <td data-target="file"><a href="<?php echo $row['fileename']; ?>">Click here!</a></td>
                        <td data-target="grade"><?php echo $row['grade1']; ?></td>
                        <td data-target="report" style="display:none;"><?php echo $row['report1']; ?></td>
                        <td data-target="type" style="display:none;"><?php echo 'reviewer1'; ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['username']; ?>">Grade and Review</td>
                    </tr>
                <?php }
                ?>
            <?php
                $sql = "SELECT * from posterabstracts where reviewer2='".$login_session."'";
                $result = mysqli_query($db,$sql); 
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                     <tr id="<?php echo $row['username']; ?>">
                     <td><?php echo $row['count']; ?></td>
                        <td data-target="username"><?php echo $row['username']; ?></td>
                        <td data-target="topic"><?php echo $row['topic']; ?></td>
                        <td data-target="file"><a href="<?php echo $row['fileename']; ?>">Click here!</a></td>
                        <td data-target="grade"><?php echo $row['grade2']; ?></td>
                        <td data-target="report" style="display:none;"><?php echo $row['report2']; ?></td>
                        <td data-target="type" style="display:none;"><?php echo 'reviewer2'; ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['username']; ?>">Grade and Review</td>
                    </tr>
                <?php }
                ?> 
            </tbody>
        </table>
                </div>
        <div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Review and Grade</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" id="topic" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" id="file" class="form-control">
                </div>
                <div class="form-group">
                <label>Grade:</label>
                <select id="grade">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                </select>
                </div>
                <div class="form-group">
                <label>Report:</label>
                <textarea id="report" placeholder="Write report here.." class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" id="type" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right">Save</a>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
        </div>
   </body>
   
   <script>
        $(document).ready(function(){
            $(document).on('click','a[data-role=update]',function(){
                var id = $(this).data('id');
                // alert(id);
                var username = $('#'+id).children('td[data-target=username]').text();
                var topic = $('#'+id).children('td[data-target=topic]').text();
                var file = $('#'+id).children('td[data-target=file]').text();
                var grade = $('#'+id).children('td[data-target=grade]').text();
                var report = $('#'+id).children('td[data-target=report]').text();
                var type = $('#'+id).children('td[data-target=type]').text();

                $('#username').val(username);
                $('#topic').val(topic);
                $('#file').val(file);
                $('#type').val(type);
                $('#grade').val(grade);
                $('#report').val(report);
                $('#myModal').modal('toggle');
            });
            $('#save').click(function(){
                // alert($('#username').val());
                var id  = $('#username').val();
                var username  = $('#username').val(); 
                var topic =  $('#topic').val();
                var file =  $('#file').val();
                var grade =  $('#grade').val();
                var report =  $('#report').val();
                // alert(reviewer1);
                var type =   $('#type').val();

                $.ajax({
                    url      : 'connection.php',
                    method   : 'post', 
                    data     : {username : username , topic: topic , file : file , grade: grade, report:report, type:type},
                    success  : function(response){
                                alert('Successfully submitted!');
                                
                                // alert(id);
                                // now update user record in table 
                                $('#'+id).children('td[data-target=username]').text(username);
                                $('#'+id).children('td[data-target=topic]').text(topic);
                                $('#'+id).children('td[data-target=file]').text(file);
                                $('#'+id).children('td[data-target=grade]').text(grade);
                                $('#'+id).children('td[data-target=report]').text(report);
                                $('#'+id).children('td[data-target=type]').text(type);
                                $('#myModal').modal('toggle'); 

                                }
                });
            });
        });

        
   </script>
   </body>
   
</html>