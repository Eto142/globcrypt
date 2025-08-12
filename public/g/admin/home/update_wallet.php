<?php
include('process_wallet.php'); 
include('includes/header.php');
include('includes/navbar.php');

?>




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">update your wallets</h1>
                <?php

                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
              </div>

                <form class="user" action="#" method="POST">
                             <div class="form-group">
                <label class="btn btn-primary"> SELECT WALLET </label>          
                            <select name="method" class="form-control">
                                <option value="bitcoin">Bitcoin(BTC)</option>
                                <option value="ethereum">Ethereum(ETH)</option>
                                <option value="usdt">Litecoin</option>
                                <option value="ripples">Ripples</option>
                                <option value="trc">Trc</option>
                                <option value="bank">BANK</option>                            
                              </select>
            </div>
                    <div class="modal-footer">
          <a href="index.php" class="btn btn-danger"> cancel</a>
            <button type="submit" name="update" class="btn btn-primary">update</button>
        </div>

                </form>



            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>