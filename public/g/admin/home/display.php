<?php 
require_once "../../../dashboardphp/admin_server.php";
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Bootstrap core CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
	<title>Admin-v2.2</title>
	<style>
		a {
			text-decoration: none;
		}
		.card {
			font-size: 12px;
			overflow-y: scroll;
		}
		.x-overflow {
			overflow-x: scroll;
		}
		#diag_con {
			width: 100%;
			height: 40px;
			margin-top: 15%;
			position: fixed;
			padding: center;
			display: none;
			z-index: 1;
		}
		#diag {
			height: 50px;
			margin: 5% 40%;
			background: #3385ff;
			padding: 20px;
			border-radius: 10px;
			box-sizing: border-box;
		}
		.search {
			box-shadow: 2px 2px 8px rgba(0,0,0,.3),
						-2px 2px 8px rgba(0,0,0,.3),
						2px -2px 8px rgba(0,0,0,.3),
						-2px -2px 8px rgba(0,0,0,.3); 
			word-spacing: 15px; 
			overflow-x: auto;
			margin: auto;
		}
		@media only screen and (max-width: 768px) {
			
			#diag_con {
				margin-top: 45%;
			}
			#diag {
				margin: 15% 10%;
			}
		}

	</style>
	<script type="text/javascript">
		function delUser() {
			var nav = document.getElementById("diag_con").style.display = "block";
		}
	</script>
</head>
<body class="bg-primary text-white">
	<div class="d-flex" id="wrapper">
	<!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="../home/" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?php echo $site; ?>" target="_blank" class="list-group-item list-group-item-action bg-light">Visit Website</a>
        <a href="wallet/" class="list-group-item list-group-item-action bg-light">Update Wallet</a>
        <a href="change_pass/" class="list-group-item list-group-item-action bg-light">Change Password</a>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>?q=logout" class="list-group-item list-group-item-action bg-light">Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background: #0080ff;">
        <button class="btn btn-primary shadow-lg outline-white" id="menu-toggle">Menu</button>
      </nav>
      <div class="container-fluid bg-primary text-white p-3">
		<div class="row">
			<div class="col-sm-6">
				<img src="../../upload/<?php echo $Tran->image(); ?>" class="shadow-lg" style="max-height: 500px; max-width: 100%;">
			</div>
			<div class="col-sm-6">
				<div class="card shadow-lg">
					<div class="card-header text-right"></div>
					<div class="card-body">
						<table class="table table-bordered table-striped">
							<tr>
								<td class="font-weight-bolder">Amount</td>
								<td class="font-weight-bold">$<?php echo $Tran->amount(); ?></td>
							</tr>
							<tr>
								<td class="font-weight-bolder">date</td>
								<td class="font-weight-bold"><?php echo $Tran->act_date(); ?></td>
							</tr>
							<tr>
								<td class="font-weight-bolder">Type</td>
								<td class="font-weight-bold"><?php echo $Tran->type(); ?></td>
							</tr>
							<tr>
								<td class="font-weight-bolder">Status</td>
								<td class="font-weight-bold"><?php echo $Tran->status(); ?></td>
							</tr>
						</table>
					</div>
					<div class="card-footer text-right">
						<a href="?id=<?php echo $_GET['id'];?>&q=confirm" class="btn btn-success">Confirm</a>
					</div>
				</div>
			</div>
	</div>
</div>
<!-- Update address -->


<!-- footer -->
</body>
  <!-- Menu Toggle Script -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    function closeBtn() {
    document.getElementById('sidebar-wrapper').style.display= "none";
	}
  </script>
</html>