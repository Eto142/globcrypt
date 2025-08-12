<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
require_once "db.php";
include('code.php'); 
?>





<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT USER
           
    </h6>
  </div>


  <div class="card-body">


  	<?php  

require_once "db.php";

if(isset($_POST['edit_btn'])){
	$id = $_POST['edit_id'];
	
	$query = "SELECT * FROM users WHERE id = '$id'";
	$query_run = mysqli_query($conn, $query);

	foreach ($query_run as $row) {
		?>

 <form action="edit.php" method="POST">
<?php  echo $report; ?>
        <div class="modal-body">
      <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $row['username']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password"value="<?php echo $row['password']; ?>">
            </div>
        
        </div>
        <div class="modal-footer">
        	<a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="update" class="btn btn-primary">update</button>
        </div>
      </form>

      <?php
	}
}

?>
</div>
</div>
</div>











<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>