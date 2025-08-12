<?php 
require_once "process_test_email.php";
include('includes/header.php'); 
include('includes/navbar.php');

?>




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">SEND MAIL TO USER
           
    </h6>
  </div>


  <div class="card-body">


 <form method="post" action="send_test_email.php">
        <div class="modal-body">
     
            <div class="form-group">
                <label class="btn btn-danger"> EMAIL </label>
                <input type="text" name="email" class="form-control">
            </div>

      <div class="form-group">
                <label class="btn btn-danger"> SUBJECT </label>
                <input type="text" name="subject" class="form-control">
            </div>

             <div class="form-group">
                <label class="btn btn-danger"> MESSAGE </label>
                <textarea class="form-control" name="message" placeholder="Message" rows="14"></textarea></div>
            </div>

               
                       
        
        </div>
        <div class="modal-footer">
            <a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="send" class="btn btn-primary">SEND</button>
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