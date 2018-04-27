<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Children Information</title>
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
        	<div class="sticky-header header-section ">
				<?php include("Header.php"); ?>
		</div>
		<?php
		require_once "includes.php";
		 ?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
				<div class="table-responsive bs-example widget-shadow">
						<h4>Children Information:</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Child's Name</th>
									<th>Date Of Birth</th>
									<th>Address</th>
									<th>Father's Name</th>
									<th>Father's Mob</th>
									<th>Father's profession</th>
									<th>Father's educational degree</th>
									<th>Father's Tel.</th>
									<th>Mother's Name</th>
									<th>Mother's Mob.</th>
									<th>Mother's profession</th>
									<th>Mother's educational degree</th>
									<th>Mother's Tel.</th>
									<th>Picker's Name</th>
									<th>Picker's Mob.</th>
									<th>Picker's ID no</th>
									<th>Picker's relation degree</th>
									<th>Picker's Tel</th>
									<th>Emergency Name</th>
									<th>Emergency  Mob.</th>
									<th>Emergency ID no</th>
									<th>Emergency  Relation degree</th>
									<th>Emergency Tel.</th>
									<th>disease</th>
									<th>medicine</th>
									<th>hobbies</th>
									<th>Date of starting</th>
									<th>know us</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mahmoud ElShafey</td>
									<td>14/01</td>
									<td>Nasr City</td>
									<td>Ahmed ElShafey</td>
									<td>***********</td>
									<td>Vet</td>
									<td>DR</td>
									<td>*********</td>
									<td>Anahid Gardens</td>
									<td>**********</td>
									<td>Teacher</td>
									<td>DR</td>
									<td>*******</td>
									<td>Mohamed ElSawa2</td>
									<td>*******</td>
									<td>*********</td>
									<td>Trusted Driver</td>
									<td>NO</td>
									<td>Mr ATEF</td>
									<td>*********</td>
									<td>*********</td>
									<td>Carry</td>
									<td>********</td>
									<td>No</td>
									<td>NO</td>
									<td>NO</td>
									<td>NO</td>
									<td>Facebook</td>
								</tr>
							</tbody>
						</table>
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
