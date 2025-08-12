<?php 
require_once "process_approv.php";
include('includes/header.php'); 
include('includes/navbar.php');

?>




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">APPROV TRANSACTIONS
           
    </h6>
  </div>


  <div class="card-body">


 <form method="post" action="approv.php">
        <div class="modal-body">
     
            <div class="form-group">
                <label class="btn btn-danger"> USERNAME </label>
                <input type="text" name="username" class="form-control" value="<?php echo $history['client_user']; ?>" readonly >
            </div>
                        <div class="form-group">
                <label class="btn btn-danger"> Amount </label>
                <input type="text" name="amount" class="form-control" value="<?php echo $history['amount']; ?>" >
            </div>
                        <div class="form-group">
                <label class="btn btn-danger"> Transaction Id </label>
                <input type="text" name="tid" class="form-control" value="<?php echo $history['tid']; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="btn btn-danger"> Method </label>
                <input type="text" name="method" class="form-control" value="<?php echo $history['method']; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="btn btn-danger"> Date </label>
                <input type="text" name="date" class="form-control" value="<?php echo $history['dep_date']; ?>" readonly >
            </div>
        </div>
        <div class="modal-footer">
            <a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="approv" class="btn btn-primary">Approve</button>
        </div>
      </form>

</div>
</div>
</div>











<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>