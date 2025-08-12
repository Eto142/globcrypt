<?php
session_start();
require 'db.php';
if(isset($_POST["upload"])){

  $image_name = $_POST["image_name"];
  $image_des = $_POST["image_des"];
  $image_creator = $_POST["image_creator"];
  $image_listing = $_POST["image_listing"];
  $image_sales = $_POST["image_sales"];
  $image_featured = $_POST["image_featured"];
  $image_status = $_POST["image_status"];
  $random = rand(0,9);
  $random_creator = substr(md5(mt_rand()), 0, 31);

  $ntf_name =  "#NFT$random~$image_name";
  




  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '../../dashboard/doc_up/nfts/' . $newImageName);
      $query = "INSERT INTO tb_upload VALUES('', '$ntf_name', '$image_des', '$random_creator', '$image_listing', '$image_sales', '$image_featured', '$image_status', '$newImageName', 'adminn', 'false')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'nft.php';
      </script>
      ";
    }
  }
}




if(isset($_POST["update"])){
     $id = $_POST['id'];
     $sales_price = $_POST['sales_price'];
     $minting_price = $_POST['minting_price'];
     $creator = $_POST['creator'];
  

$sql = "UPDATE tb_upload SET image_sales = '$sales_price', image_listing='$minting_price', image_creator='$creator'  WHERE id ='$id'";


if ($conn->multi_query($sql)){

  $sql = "UPDATE products SET product_mint = '$minting_price', product_sales ='$sales_price'  WHERE image_id ='$id'";
if ($conn->multi_query($sql)){


    echo "
<script>
alert('Details Updated Successfully')
window.location.href='nft.php';

</script>

  ";
}

      //header('location: index.php');
     }

       

    }













// Update user data
if (isset($_POST['id'])) {
     $id = $_POST['id'];

     $update = "UPDATE tb_upload SET  image_status = 1 WHERE id='$id' ";
         if(mysqli_query($conn, $update)) {
                echo "
<script>
alert('NFT has been successfully, Put On sale')
window.location.href='nft.php';

</script>

    ";
         } else {
                            echo "
<script>
alert('Failed')
window.location.href='my_nft.php';

</script>

    ";

         }
          
}

if (isset($_POST['di'])) {
     $id = $_POST['di'];

     $update = "UPDATE tb_upload SET  image_status = 0  WHERE id='$id' ";
         if(mysqli_query($conn, $update)) {
                echo "
<script>
alert('NFT has been successfully, Removed from sale')
window.location.href='nft.php';

</script>

    ";
         } else {
                            echo "
<script>
alert('Failed')
window.location.href='nft.php';

</script>

    ";

         }
          
}




if (isset($_POST['de'])) {
     $id = $_POST['de'];

     $delete = "DELETE FROM tb_upload WHERE id='$id' ";
         if(mysqli_query($conn, $delete)) {
                echo "
<script>
alert('NFT has been successfully, Deleted')
window.location.href='nft.php';

</script>

    ";
         } else {
                            echo "
<script>
alert('Failed')
window.location.href='nft.php';

</script>

    ";

         }
          
}


include('includes/header.php'); 
include('includes/navbar.php');


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
  <div class="card-header py-3">
    <h6 class="m-2 font-weight-bold text-primary">
      NFT MANAGEMENT
    </h6>

  </div>

<div class="card shadow mb-4">
  <br>


     <h6 class="text-primary">
      NFT -UPLOAD
    </h6>
    <br>
    <h6><b>SELECT NFT</b><span style="color: red;">* only pdf, jpg, png and jpeg files are allowed.<br> Maximum file size allowed is 10mb</span></h6>
    <form class="" action="nft.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
              <div class="form-group">
                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="" required>
            </div>
            <div class="form-group">
               <p class="text-dark">NFT Name:</p>
                <input type="text" name="image_name" class="form-control" placeholder="NFT name" >
            </div>
            <div class="form-group">
              <p class="text-dark">NFT Despcription:</p>
               <textarea class="form-control" name="image_des" placeholder="NFT despcription" required>NFT Despcription</textarea>

            </div>
            <div class="form-group">
               <p class="text-dark">NFT Creator:</p>
                <input type="text" name="image_creator" class="form-control" placeholder="NFT Creator" >
            </div>
       
                       
        
        </div>
          Minting price: $<input type="number" step="any" name="image_listing" style="border-radius: 5px; margin: 5px;" placeholder="listing price">
         <br>
         Sales price: $<input type="number" name="image_sales" step="any" style="border-radius: 5px; margin: 5px;" placeholder="sales price">
         <br>
        <input type="checkbox" name="image_featured" value="1" style="border-radius: 5px; margin: 5px;" placeholder="listing price">Featured listing?
         <br>
        <input type="checkbox" name="image_status" style="border-radius: 5px; margin: 5px;" placeholder="listing price">Listing status? Check for true/unchecked for false.
        <div class="modal-footer">
            <button type="submit" name="upload" class="btn btn-primary">upload</button>
        </div>
      </form>

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
  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>NFT</th>
            <th>NFT MINT</th>
            <th>NFT SALES</th>            
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody id="myTable">
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC")
      ?>

      <?php foreach ($rows as $row) : ?>


    

      <tr>
        <td> <img src="../../dashboard/doc_up/nfts/<?php echo $row["image"]; ?>" width = 50 title="<?php echo $row['image']; ?>"> </td>
        <td>$<?php echo $row["image_listing"]; ?></td>
        <td>$<?php echo $row["image_sales"]; ?></td>
                      <td>
                       <form action="#" method="post" id="form__submiT">
                       <input type="hidden" name="di" value="<?php echo $row['id']; ?>">              
              
                            <a href="#" onclick="submitForM()" name="close" class="text-danger"><i class="fa fa-times"></i>Disable Sales</a>
                        </form>
                            <form action="#" method="post" id="form__submit">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">                           
             
                            <a href="#" onclick="submitForm()" class="text-success"><i class="fa fa-check"></i> Enable Sales</a> <br/> 

                            </form>



                    <form action="nft.php" method="post">
                      <label>Change Price:</label><br>
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="text" name="sales_price" step="any" placeholder="sales price"><br>
              <input type="text" name="minting_price" step="any" placeholder="minting price"><br>
              <input type="text" name="creator"  placeholder="Creator">
              <br> 
              <input type="submit" name="update" value="Change" class='btn btn-primary'>
                                      </form>

 <br>
                        <form action="#" method="post" id="form__submiD">
                       <input type="hidden" name="de" value="<?php echo $row['id']; ?>">              
              
                            <a href="#" onclick="submitForD()" name="close" class="text-danger"><i class="fa fa-times"></i>Delete</a>
                        </form>
                                    </td> 

      </tr>
      <?php endforeach; ?>



              
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
     <script>
        function submitForm() {
            let form = document.getElementById("form__submit");
            form.submit();
        }
    </script>

         <script>
        function submitForM() {
            let form = document.getElementById("form__submiT");
            form.submit();
        }
    </script>

    <script>
        function submitForD() {
            let form = document.getElementById("form__submiD");
            form.submit();
        }
    </script>


<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>