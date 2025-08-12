<?php 
require_once "process_update2.php";
include('includes/header.php'); 
include('includes/navbar.php');

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Total Deposits
           
    </h6>
  </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              DEPOSITS 
            </button>
    </h6>
  </div>





<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Client</th>
            <th>Amount Requested</th>
            <th>Method</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
     <?php 
     if(mysqli_num_rows($withdr) > 0 ) {


    while($rowww = mysqli_fetch_assoc($withdr))
      {

?>



            <tr>
                                                  <td style="color: green"><?php echo $rowww['name']; ?></td>
                                                    <td><?php echo $rowww['amount']; ?></td> 
                                                    <td><?php echo $rowww['method']; ?></td>
                                                    <td><?php echo $rowww['status']; ?></td>
                                                    <td><?php echo $rowww['with_date']; ?></td>


              <td><form action="update2.php" method="post">
              <input type="hidden" name="id" value="<?php echo $rowww['id']; ?>">
                <input type="hidden" name="email" value="<?php echo $rowww['email']; ?>">
                <input type="hidden" name="wallet" value="<?php echo $rowww['wallet']; ?>">
              <input type="hidden" name="amount" value="<?php echo $rowww['amount']; ?>">
              <input type="hidden" name="status" value="<?php echo $rowww['status']; ?>">
              <input type="hidden" name="method" value="<?php echo $rowww['method'];?>">
              <input type="hidden" name="with_date" value="<?php echo $rowww['with_date']; ?>">
              <input type="submit" name="approv_with" value="APPROVE" class='btn btn-primary'>
              <input type="submit" name="decline_with" value="DECLINE" class='btn btn-danger'>
                                      </form></td>    

          
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




                      
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
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