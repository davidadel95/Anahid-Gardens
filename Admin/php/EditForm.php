<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Form Edit</title>
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

		<?php
		require_once "includes.php";
		 ?>
		<!-- //header-ends -->
		<!-- main content start-->
    <div id="page-wrapper">
			<div class="main-page">
        <div class="forms">
          <div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-title">
							<h4>New Form</h4>
						</div>
						<div class="form-body">
							<form method="post" >
								<div class="form-group">


										<label> Form Name </label>
										<input type="text" class="form-control" placeholder="eg: Student Application">
										<br>
										<input type="submit">
                                </div>
								</form>
</div>
</div>



						<div class="form-title">
							<h4>Add Fields</h4>
						</div>

							<div class="form-body">

							<form name="Options">
								<div class="form-group">
									<label>Field Name</label>
									<input type="text" name="FieldName" class="form-control" placeholder="eg: Date Of Birth">
									<br>
									<label> Field Type </label>
									<select name="TypeOfField"  class="form-control" >

									<option value="varchar">Text</option>
									<option value="Integer">Integer</option>
									<option value="Float">Decimel</option>
									<option value="Boolean">Yes Or No</option>
									</select>
									<br> <br>
									<input type="submit">
								</div>
							</form>
					</div>







				<div class="form-title">
					<h4>Forms Edit</h4>
				</div>



						<div class="form-body">
							<form method="post">
                <div class="form-group">
									<select name="cars"  class="form-control" >

  								<option value="volvo">Nannys Form</option>
  								<option value="saab">Drivers Form</option>
  								<option value="fiat">Doctors Forms</option>
  								<option value="audi">Teachers Forms</option>
									</select>

                </div>
								<div class="form-group">
									<input type = "checkbox" value= "FirstName"> First Name </br>
									<input type = "checkbox" value= "LastName"> Last Name </br>
									<input type = "checkbox" value= "Age"> Age </br>
									<input type = "checkbox" value= "Comments"> Comments </br>
									<input type = "checkbox" value= "Address"> Address  </br>
									<input type = "checkbox" value= "KnownUsFrom"> Known Us Form  </br>


                </div>
               <input type="submit">
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
