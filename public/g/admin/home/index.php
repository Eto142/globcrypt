<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
include('process_delete.php');

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
<!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for it..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<!-- Topbar Search -->
          
            <div class="input-group">
               <input class="form-control" id="myInput" type="text" placeholder="Search..">

              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          

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

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>EMAIL </th>            
            <th>DELETE USER</th>
            <th>VIEW USER</th>
            <th>SENDMAIL </th>
          </tr>
        </thead>
        <tbody id="myTable">
     <?php 
     if(mysqli_num_rows($query_run) > 0 ) {


      while($row = mysqli_fetch_assoc($query_run))

      {

?>



            <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['email']; ?></td>

           <?php echo "<td><a href='$_SESSION[PHP_SELF]?id=$row[id]&q=delete_user' class='btn btn-danger' >DELETE USER</a></td>";?>


            <?php echo "<td><a href='update.php?username_sess=$row[email]'class='btn btn-primary'>VIEW USER</a></td>"; ?>

           <?php echo "<td><a href='send_mail.php?username_sess=$row[email]'class='btn btn-success'>SENDMAIL</a></td>"; ?>
          </tr>
               <?php  
              }
    }

else  {
  echo "no record found";
}


     ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>



<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>