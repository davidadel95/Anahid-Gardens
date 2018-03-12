<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

		<!-- Bootstrap Core CSS -->
		<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />

		<!-- Custom CSS -->
		<link href="../css/style.css" rel='stylesheet' type='text/css' />

		<!-- font-awesome icons CSS -->
		<link href="../css/font-awesome.css" rel="stylesheet">
		<!-- //font-awesome icons CSS-->

		<!-- side nav css file -->
		<link href='../css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
		<!-- //side nav css file -->

		 <!-- js-->
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/modernizr.custom.js"></script>

		<!--webfonts-->
		<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
		<!--//webfonts-->

		<!-- chart -->
		<script src="../js/Chart.js"></script>
		<!-- //chart -->

		<!-- Metis Menu -->
		<script src="../js/metisMenu.min.js"></script>
		<script src="../js/custom.js"></script>
		<script  src="../js/index1.js"></script>
		<link href="../css/custom.css" rel="stylesheet">
	</head>
	<body class="">
				<div id="page-wrapper">
					<div class="main-page login-page ">
						<h2 class="title1">Login</h2>
						<div class="widget-shadow">
							<div class="login-body">
								<form method="post">
									<input type="password" class="user" name="username" placeholder="Enter Your username" required="">
									<input type="password" name="password" class="lock" placeholder="Password" required="">
									<div class="forgot-grid">
									<input type="submit" name="Sign-In" value="Sign-In">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--footer-->
	<div class="footer">
	   <?php include("Footer.php"); ?>
	</div>
    <!--//footer-->
	</div>
	<!--scrolling js-->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <!-- <script src="js/bootstrap.js"> </script> -->
	<!-- //Bootstrap Core JavaScript -->

	</body>
</html>

<?php
	include_once("../Classes/User.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
			$username = $_POST['username'];
			$password = $_POST['password'];

			if ($username != "" && $password != ""){
				$user = new User;
				$user->login($username, $password);
			}
	}

?>
