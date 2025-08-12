<?php 
require_once "process_update2.php";
include('includes/header.php'); 
include('includes/navbar.php');

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Total Profit
           
    </h6>
  </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             PROFIT HISTORY 
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
            <th>Plan/Narration</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
    <?php 
     if(mysqli_num_rows($prof) > 0 ) {


    while($ro = mysqli_fetch_assoc($prof))
      {

?>



            <tr>
                                                  <td style="color: green"><?php echo $ro['client_user']; ?></td>
                                                    <td><?php echo $ro['amount']; ?></td>
                                                    <td><?php echo $ro['plan_name']; ?></td>
                                                    <td><?php echo $ro['date_created']; ?></td>
                                                    

  

          
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