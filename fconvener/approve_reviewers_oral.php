<?php
   include('../session.php');
   $sql = "SELECT * from oralabstracts";
   $result = mysqli_query($db,$sql);

?>
<html>
   
   <head>
      <title>Allot reviewers</title>

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
               <h1> <a allign="center" href="../fconvener.php"><b>Research Conclave</b></a></h1>
            </div>
            <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li ><a href="../fconvener.php">Home</a></li>
                    <li><a href="../post_notifications.php">Post Notifications</a></li>
                    <li class="active">
                        
                        <label for="drop-2" class="toggle">Dropdown 
                        </label>
                        <a href="approve_reviewers.php">Approve reviewers</a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                            <li><a href="approve_reviewers.php" class="drop-text">Poster Presentation</a></li>
                            <li><a href="approve_reviewers_oral.php" class="drop-text">Oral Presentation</a></li>
                        </ul>
                     </li>

                    <li><a href="view_grades.php">View Grades</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
           
        </div>
    </header> 

   <body>
       
        <div class="table-users">
        <div class="header">Reviewer Approval</div>
        <table cellspacing="0" style="text-align:center">
            <thead>
                <tr>
                <th>Serial</th>
                    <th>Username</th>
                    <th>Topic</th>
                    <th>Reviewer 1</th>
                    <th>Reviewer 2</th>
                    <th>Status</th>
                    <th>Approve</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody >
                <?php
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                    <tr id="<?php echo $row['username']; ?>">
                    <td><?php echo $row['count']; ?></td>
                        <td data-target="username"><?php echo $row['username']; ?></td>
                        <td data-target="topic"><?php echo $row['topic']; ?></td>
                        <td data-target="reviewer1"><?php echo $row['reviewer1']; ?></td>
                        <td data-target="reviewer2"><?php echo $row['reviewer2']; ?></td>
                        <td data-target="status"><?php echo $row['reviewapp']; ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['username']; ?>">Approve</td>
                        <td><a href="#" data-role="edit" data-id="<?php echo $row['username']; ?>">Edit</td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
                </div>

        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Reviewers</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" id="topic" class="form-control">
                </div>
                <div class="form-group">
                <label>Reviewer 1:</label>
                <select id="reviewer1" class="form-control">
                    <?php
                    $sql = "SELECT username,name from reviewer_type WHERE type = 'oral'";
                    $result = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    <option value="<?php echo $row['username'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label>Reviewer 2:</label>
                <select id="reviewer2" class="form-control">
                <?php
                    $sql = "SELECT username,name from reviewer_type WHERE type = 'oral'";
                    $result = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    <option value="<?php echo $row['username'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right">Assign</a>
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
                var username = $('#'+id).children('td[data-target=username]').text();
                var topic = $('#'+id).children('td[data-target=topic]').text();
                var reviewer1 = $('#'+id).children('td[data-target=reviewer1]').text();
                var reviewer2 = $('#'+id).children('td[data-target=reviewer2]').text();
                var status = $('#'+id).children('td[data-target=status]').text();
                if(status == 'Approved')
                {
                    alert("Already approved");
                }
                else{
                    $.ajax({
                    url      : 'connection2.php',
                    method   : 'post', 
                    data     : {username : username , topic: topic , reviewer1 : reviewer1 , reviewer2: reviewer2},
                    success  : function(response){
                                alert('Approved Successfully');
                                
                                // alert(id);
                                // now update user record in table 
                                $('#'+id).children('td[data-target=username]').text(username);
                                $('#'+id).children('td[data-target=topic]').text(topic);
                                $('#'+id).children('td[data-target=reviewer1]').text(reviewer1);
                                $('#'+id).children('td[data-target=reviewer2]').text(reviewer2);
                                $('#'+id).children('td[data-target=status]').text('Approved');
                                }
                    });
                }
                
                
            });

            $(document).on('click','a[data-role=edit]',function(){
                
                var id = $(this).data('id');
                // alert(id);
                var username = $('#'+id).children('td[data-target=username]').text();
                var topic = $('#'+id).children('td[data-target=topic]').text();
                var reviewer1 = $('#'+id).children('td[data-target=reviewer1]').text();
                var reviewer2 = $('#'+id).children('td[data-target=reviewer2]').text();
                var status = $('#'+id).children('td[data-target=status]').text();
                if(status == 'Approved')
                {
                    alert('Caution: reviewers for this submission have alredy been approved.');
                }
                $('#username').val(username);
                $('#topic').val(topic);
                // $('#reviewer1').val(reviewer1);
                // $('#reviewer2').val(reviewer2);
                $('#myModal').modal('toggle');
            });
            $('#save').click(function(){
                // alert($('#username').val());
                var id  = $('#username').val();
                var username  = $('#username').val(); 
                var topic =  $('#topic').val();
                var reviewer1 =  $('#reviewer1').val();
                // alert(reviewer1);
                var reviewer2 =   $('#reviewer2').val();

                $.ajax({
                    url      : 'connection2.php',
                    method   : 'post', 
                    data     : {username : username , topic: topic , reviewer1 : reviewer1 , reviewer2: reviewer2},
                    success  : function(response){
                                alert('Edited and Approved Successfully');
                                
                                // alert(id);
                                // now update user record in table 
                                $('#'+id).children('td[data-target=username]').text(username);
                                $('#'+id).children('td[data-target=topic]').text(topic);
                                $('#'+id).children('td[data-target=reviewer1]').text(reviewer1);
                                $('#'+id).children('td[data-target=reviewer2]').text(reviewer2);
                                $('#'+id).children('td[data-target=status]').text('Approved');
                                $('#myModal').modal('toggle'); 

                                }
                });
            });
            
            });

        
   </script>
</html>
