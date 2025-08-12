<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php');

require_once "process_notification.php";
$c = $_GET['c'];
$tr = new trunc($conn, $c);

// Authenticate admin login
if(empty($_SESSION['admin_username'])) {
  header('location: ../');
} 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              USERS 
            </button>
    </h6>
  </div>
<?php 
require_once "db.php";
$query = "SELECT * FROM users";
$query_run = mysqli_query($conn, $query);


?>
  <div class="card-body">

    <div class="table-responsive">

          <a href="<?php echo $_SERVER['PHP_SELF']; ?>?c=clear" class="text-white clear btn btn-danger float-right">Clear All</a>
  </div>
  <div class="container py-3 my-3 px-2">
    
    <div class="mt-2">
      <?php
        while($row = mysqli_fetch_assoc($query_p)) {
          echo "<div class='w-100 clearfix'>
          <span class='float-left text-warning'>$row[n_date]</span>";
          if ($row['n_status'] == 'read') {
            echo "<span class='float-right text-muted'>read</span>";
          } else {
            echo "<span class='float-right text-light'>unread</span>";
          }
          echo "</div>
          <div class='w-100 clearfix mt-1'>
            <a href='update2.php?username_sess=$row[n_user]&v=$row[n_status]&d=$row[n_date]' class='float-left' style='display:block;width:90%;'>$row[n_description]</a>
            <a href='update2.php?username_sess=$row[n_user]&v=$row[n_status]&d=$row[n_date]' class='float-right text-white'><i class='fa fa-eye'></i></a>
          </div>
          <hr class='hr'>";
        }

      ?>
    </div>
  </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>