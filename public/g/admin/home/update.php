<?php 
require_once "process_update.php";
include('includes/header.php'); 
include('includes/navbar.php');

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT USER
           
    </h6>
  </div>


  <div class="card-body">


 <form method="post" action="update.php">
        <div class="modal-body">
      <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
       <input type="hidden" name="email"  value="<?php echo $row['email']; ?>">

            <div class="form-group">
                <label class="btn btn-danger"> FULL NAME </label>
                <input type="text" name="fname" class="form-control" placeholder="Enter fullname" value="<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="btn btn-danger"> COUNTRY </label>
                <input type="text" name="country" class="form-control" placeholder="country" value="<?php echo  $row['country'] ?>" readonly >
            </div>
                     
            <div class="form-group">
                <label class="btn btn-danger"> EMAIL </label>
                <input type="text" name="email" class="form-control" placeholder="Enter fullname" value="<?php echo $row['email']; ?>" readonly >
            </div>

      <div class="form-group">
                <label class="btn btn-danger">TOTAL BALANCE </label>
                <input type="text" name="total" class="form-control"  value="$<?php echo $balance; ?>" readonly>
            </div>
             <div class="form-group">
                <label class="btn btn-danger">TOTAL DEPOSIT </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $user_deposits; ?>" readonly>
            </div>             
            <div class="form-group">
                <label class="btn btn-danger">TOTAL TRADE </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $trade; ?>" readonly>
            </div>

             <div class="form-group">
                <label class="btn btn-danger">TOTAL PROFIT </label>
                <input type="text" name="profit" class="form-control"  value="<?php echo $user_profit; ?>" readonly>
            </div>
        <div class="form-group">
                <label class="btn btn-danger">TOTAL WITHDRAWAL </label>
                <input type="text" name="profit" class="form-control"  value="<?php echo $withdrawal; ?>" readonly>
            </div>

              <div class="form-group">
                <label class="btn btn-danger">TOTAL BONUS </label>
                <input type="text" name="profit" class="form-control"  value="<?php echo $row['bonus']; ?>" readonly>
            </div>

            <h3>Add Profit</h3>
             <div class="form-group">
                <label class="btn btn-danger"> TOP UP PROFIT </label>
                <input type="text" name="amount" class="form-control" >
            </div>
           
            <div class="form-group">
                <label class="btn btn-danger">INVESTMENT DATE </label>
                <input type="date" name="inv_date" class="form-control" >
            </div>
            <div class="form-group">
                <label class="btn btn-danger">PLAN NAME</label>
                <input type="text" name="plan_name" class="form-control" >
            </div>

          
        
        </div>
        <div class="modal-footer">
        	<a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="topup" class="btn btn-primary">top up</button>
        </div>
      </form>

    <h3>Add Bonus</h3>
<form method="post" action="update.php">
    <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
 <div class="form-group">
                <label class="btn btn-danger"> TOP UP BONUS </label>
                <input type="text" name="bonus" class="form-control" >
            </div>
             <div class="modal-footer">
            <a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="updatebonus" class="btn btn-primary">top up</button>
        </div>

            </form>
</div>

 <!-- <h3>Add User Deposit</h3>
<form method="post" action="update.php">
    <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
 <div class="form-group">
                <label class="btn btn-danger"> Amount </label>
                <input type="number" name="amount" class="form-control" >
            </div>
            <div class="form-group">
                <label class="btn btn-danger"> Date</label>
                <input type="date" name="depdate" class="form-control" >
            </div>
             <div class="modal-footer">
            <a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="updatedeposit" class="btn btn-primary">top up</button>
        </div>

            </form>
</div> -->



 <h3>Update Trade Status</h3>
<form method="post" action="update.php">
    <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
 <div class="form-group">
                <label class="btn btn-danger"> Trade Status </label>
                <input type="text" name="tstatus" class="form-control"  value="<?php echo $row['tstatus']; ?>">
            </div>
             <div class="modal-footer">
            <a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="updatestatus" class="btn btn-primary">Update Status</button>
        </div>

            </form>
</div>

<!-- <div class="form-group">
                <label class="btn btn-danger"> STATUS </label>          
                            <select name="status" class="form-control">
                                <option selected value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                                <option value="Active">ACTIVE</option>
                                <option value="paused">PAUSE</option>
                            </select>
            </div>


</div> -->

<!-- DataTales Example -->
<!-- <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Withdrawal Details
           
    </h6>
  </div>  -->
 <!--  <div class="card-body">


 <form method="post" action="#">
        <div class="modal-body">
      <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label class="btn btn-danger"> Bitcoin Wallet </label>
                <input type="text" name="fname" class="form-control"  value="<?php echo $row['btc_address']; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="btn btn-danger"> Ethereum Wallet</label>
                <input type="text" name="email" class="form-control"  value="<?php echo $row['eth_address']; ?>" readonly >
            </div>

      <div class="form-group">
                <label class="btn btn-danger"> Litecoin Wallet </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['ltc_address']; ?>" 
                readonly>
            </div>
    <div class="form-group">
                <label class="btn btn-danger"> TRC Wallet </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['trc_address']; ?>" 
                readonly>
    </div>
    
          <div class="form-group">
                <label class="btn btn-danger"> Ripples Wallet </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['ripples_address']; ?>" 
                readonly>
            </div>

              <div class="form-group">
                <label class="btn btn-danger"> Bank Name </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['bank_name']; ?>" 
                readonly>
            </div>
    <div class="form-group">
                <label class="btn btn-danger"> Account Name </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['account_name']; ?>" 
                readonly>
    </div>
    
          <div class="form-group">
                <label class="btn btn-danger"> Account Number </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['account_no']; ?>" 
                readonly>
            </div>

             <div class="form-group">
                <label class="btn btn-danger"> Swift </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['scode']; ?>" 
                readonly>
            </div>
           <div class="form-group">
                <label class="btn btn-danger"> Routing Number </label>
                <input type="text" name="capital" class="form-control"  value="<?php echo $row['rnumber']; ?>" 
                readonly>
            </div>

                       
        
        </div>
      </form>

</div>
</div> -->
</div>











<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>