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
            <th>Amount</th>
            <th>Method</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
     <?php 
     if(mysqli_num_rows($dephistory) > 0 ) {


      while($roww = mysqli_fetch_assoc($dephistory))

      {

?>



            <tr>
                                                  <td style="color: green"><?php echo $roww['name']; ?></td>
                                                    <td><?php echo $roww['amount']; ?></td>
                                                    <td><?php echo $roww['method']; ?></td>
                                                    <td><?php echo $roww['status']; ?></td>
                                                    <td><?php echo $roww['dep_date']; ?></td>

              <td><form action="update2.php" method="post">
              <input type="hidden" name="id" value="<?php echo $roww['id']; ?>">
              <input type="hidden" name="client_user" value="<?php echo $roww['client_user']; ?>">
              <input type="hidden" name="email" value="<?php echo $roww['email']; ?>">
              <input type="hidden" name="amount" value="<?php echo $roww['amount']; ?>">
              <input type="hidden" name="method" value="<?php echo $roww['method']; ?>">
              <input type="hidden" name="status" value="<?php echo $roww['status'];?>">
              <input type="hidden" name="dep_date" value="<?php echo $roww['dep_date'];?>">
              
              
              <input type="submit" name="approvv" value="APPROVE" class='btn btn-primary'>
              <input type="submit" name="decline" value="DECLINE" class='btn btn-danger'>
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