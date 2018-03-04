<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Extra Cloth</title>
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
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
				<div class="table-responsive bs-example widget-shadow">
						<h4>Children Extra Clothes:</h4>
						<table class="table table-bordered"> 
							<thead>
								<tr>
									<th>#</th>
                                    <th>Name</th>
									<th>Small towel</th>
									<th>Big towel</th>
									<th>Underwear</th>
									<th>T-shirt</th>
									<th>pantlon</th> 
									<th>pampers</th>
								</tr>
							</thead> 
							<tbody>
								<tr> 
									<th scope="row">1</th>
									<td>Mahmoud ElShafey</td> 
									 <td><div class="checkboxes"><input type="checkbox"/></div></td>
									 <td><div class="checkboxes"><input type="checkbox"/></div></td>
									 <td><div class="checkboxes"><input type="checkbox"/></div></td>
									 <td><div class="checkboxes"><input type="checkbox"/></div></td>
									 <td><div class="checkboxes"><input type="checkbox"/></div></td>
									 <td><div class="checkboxes"><input type="checkbox"/></div></td>

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