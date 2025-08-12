<?php include_once "../../../../dashboardphp/admin_secure_server.php"; 
	empty($sess)? header('location:../') : '';  ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<title>Change Password</title>
	<style>
		.con-m {
			margin-top: 10%;
			width: 40%;
		}
		@media only screen and (max-width: 768px) {
			
			.con-m {
				margin-top: 30%;
				width: 90%;
			}
		}
	</style>
</head>
<body class="text-center">
	<div class="container-fluid h-50 con-m">
		<h3 class="text-muted">CHANGE PASSWORD</h3>
		<div class="container bg-light shadow-sm p-4 mt-5">
			<?php echo $report; ?>
			<form method="post">
				<div class="form-group">
					<label class="float-left">New Password</label>
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" name="pass_new" class="form-control ">
					</div>
				</div>

				<!-- Current Password -->
				<div class="form-group">
					<label class="float-left">Current Password</label>
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" name="pass_cur" class="form-control ">
					</div>
				</div>

				<div class="w-100">
                    <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                </div>
			</form>
		</div>
	</div>
	
</body>
</html>