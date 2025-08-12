<?php 
require_once "process_update2.php";
include('includes/header.php'); 
include('includes/navbar.php');

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">TotalInvestments
           
    </h6>
  </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             ROI HISTORY 
            </button>
    </h6>
  </div>





<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            
                                                    <th>Client</th> 
                                                    <th>Description</th>
                                                    <th>Duration</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
											    	
											    </tr>
          </tr>
        </thead>
        <tbody>
    <?php 
                                       if(mysqli_num_rows($pla) > 0 ) {


                                         while($r = mysqli_fetch_assoc($pla))

                                           {

                                              ?>



            <tr>
                                                  <td style="color: red"><?php echo $r['client_user']; ?></td>
                                                    <td><?php echo $r['plan_name']; ?>.<hr></td>
                                                    <td><?php echo $r['plan_duration']; ?>.</td>
                                                    <td>$<?php echo $r['plan_amount']; ?></td>
                                                    <td><?php echo $r['plan_date']; ?></td>
                                                    

  

          
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