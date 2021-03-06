<!DOCTYPE html>
<html lang="en">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<!-- Title and other stuffs -->
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<!-- Stylesheets -->
		<link href="style/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="style/font-awesome.css">
		<link href="style/style.css" rel="stylesheet">
		<link href="style/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 Support for IE -->
		<!--[if lt IE 9]>
		<script src="js/html5shim.js"></script>
		<![endif]-->
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico">
    </head>
    <body>
		<!-- Form area -->
		<div class="admin-form">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<!-- Widget starts -->
						<div class="widget wgreen">
							<!-- Widget head -->
							<div class="widget-head">
								<i class="icon-lock"></i> Login
							</div>
							<div class="widget-content">
								<div class="padd">
									<!-- Login form -->
									<form class="form-horizontal" method="post" action="session/connect.php">
										<!-- Email -->
										<div class="control-group">
											<label class="control-label" for="inputEmail">Email</label>
											<div class="controls">
												<input type="text" id="inputEmail" name="user-login" placeholder="Email">
											</div>
										</div>
										<!-- Password -->
										<div class="control-group">
											<label class="control-label" for="inputPassword">Password</label>
											<div class="controls">
												<input type="password" id="inputPassword" name="user-passwd" placeholder="Password">
											</div>
										</div>
										<!-- Remember me checkbox and sign in button -->
										<div class="control-group">
											<div class="controls">
												<!--<label class="checkbox">
													<input type="checkbox"> Remember me
												</label>
												<br>-->
												<button type="submit" class="btn btn-danger">Sign in</button>
												<button type="reset" class="btn">Reset</button>
											</div>
										</div>
									</form>

								</div>
							</div>
							<!--<div class="widget-foot">
								Not Registred? <a href="#">Register here</a>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- JS -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script>
			$(document).ready(function(){
				$('#inputEmail').focus();
			});
		</script>
    </body>
</html>
