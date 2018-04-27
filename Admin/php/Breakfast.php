<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Anahid Gardens - Breakfast Table</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/meal.css" rel="stylesheet" type="text/css"/>
<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="../css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='../css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->

 <!-- js-->
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->

<!-- Metis Menu -->
<script src="../js/metisMenu.min.js"></script>
<script src="../js/custom.js"></script>
<link href="../css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

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
        <div class="tables" border="1">
          <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
            <?php
            require_once "includes.php";
             ?>
            <h2>Breakfast</h2>
            <br/>
            <form action="" method="POST">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <td>|</td>
                        <th>Egg</th>
                        <th>Cheese</th>
                        <th>Zabady</th>
                        <th>Apple</th>
                        <th>Milk</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Youssef Alaa Eldin</td>
                      <td>|</td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>David Adel</td>
                      <td>|</td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Mahmoud Ahmed</td>
                      <td>|</td>
                      <td><div class="checkboxes"><input type="checkbox"/></div> </td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                      <td><div class="checkboxes"><input type="checkbox"/></div></td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>John Monir</td>
                        <td>|</td>
                        <td><div class="checkboxes"><input type="checkbox"/></div></td>
                        <td><div class="checkboxes"><input type="checkbox"/></div></td>
                        <td><div class="checkboxes"><input type="checkbox"/></div></td>
                        <td><div class="checkboxes"><input type="checkbox"/></div></td>
                        <td><div class="checkboxes"><input type="checkbox"/></div></td>
                    </tr>
                  </tbody>
                </table>
            </form>
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



	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
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
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->

	<!-- Bootstrap Core JavaScript -->
   <!-- <script src="js/bootstrap.js"> </script> -->
	<!-- //Bootstrap Core JavaScript -->

</body>
</html>
