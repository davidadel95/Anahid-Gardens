<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Add Driver</title>
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
<!--//Metis Menu -->
<style>

</style>
    </head>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	   <?php include("Navigationbar2.php"); ?>
	</div>
		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<?php include("Header.php"); ?>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Teacher application</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms">
						<div class="form-title">
							<h4>Teacher information:</h4>
						</div>
						<div class="form-body">
							<form> 
							<div class="form-group"> <label for="exampleInputEmail1">Teacher's name</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name"> </div>
							<div class="form-group"> <label for="exampleInputEmail1">Last name</label> <input type="text" class="form-control" id="exampleInputEmail2" placeholder="name"> </div>	
							<div class="form-group"> <label for="exampleInputPassword1">Date of Birth</label> <input type="date" class="form-control" id="exampleInputPassword1" placeholder="DOB"> </div> 
							<div class="form-group"> <label for="exampleInputEmail1">Mobile Number</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name"> </div>							
							<div class="form-group"> <label for="exampleInputEmail1">Address</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Address"> </div>
							<div class="form-group"> <label for="exampleInputEmail1">Faculty</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name"> </div>
							<div class="form-group"> <label for="exampleInputEmail1">Language</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name"> </div>
							<div class="form-group"> <label for="exampleInputEmail1">Expected salary</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name"> </div>
							<div class="form-group"> <label for="exampleInputEmail1">Experience</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name"> </div>
							<div class="form-group"> <label for="exampleInputEmail1">Know us from</label> <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name"> </div>
							&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							<button type="submit" class="btn btn-default">Send application</button>
							
							</form>
						</div>
					</div>
				    </div>
					</div>
					</div>
					
      	<div class="footer">
  	   <?php include("Footer.php"); ?>
  	</div>
    <!--//footer-->
	</div>


	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="../js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};


			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->

	<!--scrolling js-->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!--//scrolling js-->

	<!-- Bootstrap Core JavaScript -->
   <!-- <script src="js/bootstrap.js"> </script> -->
	<!-- //Bootstrap Core JavaScript -->
					</body>
		</html>