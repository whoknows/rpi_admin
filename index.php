<?php
include "conf/init.php";
$user = new User();
if (!$user->isConnected()) {
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>RPi Administrator</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="raspberry pi dashboard">
		<meta name="keywords" content="raspberry pi dashboard">
		<meta name="author" content="Guillaume Coste">

		<link href="style/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="style/font-awesome.css">
		<link rel="stylesheet" href="style/jquery-ui.css">
		<link rel="stylesheet" href="style/fullcalendar.css">
		<link rel="stylesheet" href="style/prettyPhoto.css">
		<!--<link rel="stylesheet" href="style/rateit.css">-->
		<link rel="stylesheet" href="style/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="style/jquery.gritter.css">
		<link rel="stylesheet" href="style/jquery.cleditor.css">
		<link rel="stylesheet" href="style/bootstrap-toggle-buttons.css">
		<link href="style/style.css" rel="stylesheet">
		<link href="style/widgets.css" rel="stylesheet">
		<link href="style/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 Support for IE -->
		<!--[if lt IE 9]>
		<script src="js/html5shim.js"></script>
		<![endif]-->

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico">
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
					<a href="index.php" class="brand"><img src="img/sprite.png" alt="rpi"/>&nbsp;<span class="bold">Raspberry Pi</span> Admin</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<li class="dropdown pull-right">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<img src="img/user.jpg" alt="" class="nav-user-pic" /> <?php echo $user->getAttribute('login'); ?> <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="?page=profile"><i class="icon-user"></i> Profile</a></li>
									<li><a href="#"><i class="icon-cogs"></i> Settings</a></li>
									<li><a href="session/disconnect.php"><i class="icon-off"></i> Logout</a></li>
								</ul>
							</li>
						</ul>

						<!-- Notifications -->
						<!--<ul class="nav pull-right">
							<li class="dropdown dropdown-big">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown">
									<i class="icon-user"></i> Users <span   class="badge badge-success">2</span>
								</a>
								<ul class="dropdown-menu">
									<li><h5><i class="icon-user"></i> Users</h5><hr /></li>
									<li>
										<a href="#">Ravi Kumar</a> <span class="label label-warning pull-right">Free</span>
										<div class="clearfix"></div>
										<hr />
									</li>
									<li>
										<a href="#">Balaji</a> <span class="label label-important pull-right">Premium</span>
										<div class="clearfix"></div>
										<hr />
									</li>
									<li><div class="drop-foot"><a href="#">View All</a></div></li>
								</ul>
							</li>
						</ul>-->
					</div>
				</div>
			</div>
		</div>

		<!-- Main content starts -->
		<div class="content">
			<!-- Sidebar -->
			<div class="sidebar">
				<div class="sidebar-dropdown"><a href="#">Navigation</a></div>
				<div class="sidebar-inner">
					<!-- Search form -->
					<div class="sidebar-widget">
						<form class="form-inline">
							<div class="input-append row-fluid">
								<input type="text" class="span8" placeholder="Search">
								<button type="submit" class="btn btn-info">Search</button>
							</div>
						</form>
					</div>

					<!--- Sidebar navigation -->
					<!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
					<ul class="navi">
						<!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->
						<li class="nred"><a href="?page=index"><i class="icon-desktop"></i> Dashboard</a></li>
						<li class="ngreen"><a href="?page=charts"><i class="icon-bar-chart"></i> Charts</a></li>
						<li class="nlightblue"><a href="?page=tables"><i class="icon-table"></i> Tables</a></li>
						<li class="norange"><a href="?page=system"><i class="icon-cog"></i> System</a></li>
						<li class="nviolet"><a target="_blank" href="http://192.168.1.21:8888"><i class="icon-music"></i> Music</a></li>
						<li class="has_submenu nblue">
							<a href="#">
								<i class="icon-th"></i> Widgets
								<span class="pull-right"><i class="icon-angle-right"></i></span>
							</a>
							<ul>
								<li><a href="?page=widgets1">Widgets #1</a></li>
								<li><a href="?page=widgets2">Widgets #2</a></li>
							</ul>
						</li>
						<li class="has_submenu nviolet">
							<a href="#">
								<i class="icon-file-alt"></i> Pages #1
								<span class="pull-right"><i class="icon-angle-right"></i></span>
							</a>
							<ul>
								<li><a href="?page=calendar">Calendar</a></li>
								<li><a href="?page=post">Make Post</a></li>
								<li><a href="?page=error-log">Error Log</a></li>
								<li><a href="?page=support">Support</a></li>
								<li><a href="?page=gallery">Gallery</a></li>
								<li><a href="?page=invoice">Invoice</a></li>
								<li><a href="?page=media">Media</a></li>
								<li><a href="?page=profile">Profile</a></li>
								<li><a href="?page=forms">Forms</a></li>
								<li><a href="?page=ui">UI Elements</a></li>
							</ul>
						</li>
					</ul>
					<!-- Date -->
					<div class="sidebar-widget">
						<div id="todaydate"></div>
					</div>
				</div>
			</div>
			<!-- Sidebar ends -->

			<?php
			$page = 'index';
			if (isset($_GET['page']) && !empty($_GET['page']) && !is_array($_GET['page'])) {
				$page = htmlspecialchars($_GET['page']);
			}
			echo Tools::addSubView('pages/' . $page . '.php');
			?>
			<input type="hidden" name="current_page" value="<?php echo $page; ?>" />
		</div>
		<!-- Content ends -->

		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span>
		<!-- JS -->
		<script src="js/jquery.js"></script> <!-- jQuery -->
		<script src="js/bootstrap.js"></script> <!-- Bootstrap -->
		<script src="js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
		<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
		<!--<script src="js/jquery.rateit.min.js"></script>--> <!-- RateIt - Star rating -->
		<script src="js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

		<script src="js/excanvas.min.js"></script>
		<!--<script src="js/jquery.flot.js"></script>
		<script src="js/jquery.flot.resize.js"></script>
		<script src="js/jquery.flot.pie.js"></script>
		<script src="js/jquery.flot.stack.js"></script>-->

		<script src="js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
		<script src="js/sparklines.js"></script> <!-- Sparklines -->
		<!--<script src="js/jquery.cleditor.min.js"></script>--> <!-- CLEditor -->
		<script src="js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
		<script src="js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
		<script src="js/filter.js"></script> <!-- Filter for support page -->
		<script src="js/custom.js"></script> <!-- Custom codes -->
		<script src="js/dygraph-combined.js"></script>
		<?php
		if(file_exists(addslashes('pages/js/' . $page . '.js'))){
			echo '<script src="pages/js/' . $page . '.js"></script>';
		}
		?>
	</body>
</html>
