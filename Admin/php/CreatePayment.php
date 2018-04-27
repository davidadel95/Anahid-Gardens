<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Create Dynamic Payment</title>
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
<!-- <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet"> -->
<!--//webfonts-->

<!-- chart -->
<script src="../js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="../js/metisMenu.min.js"></script>
<script src="../js/custom.js"></script>
<script  src="../js/index1.js"></script>
<!-- <link href="../css/custom.css" rel="stylesheet"> -->
<!--//Metis Menu -->
<style>

</style>

<?php

require_once "includes.php";
 
    $PaymentEAVModel = new PaymentEAVModel;
    $POptionsModel = new POptionsModel;
    list($POptionArr,$OptionNames) = $POptionsModel->View();
    $OptionsTypeModel = new OptionsTypeModel;
    if (isset($_POST["PaymentNameAdded"])) {
        $PaymentEAVModel->PMethod = $_POST["PaymentName"];
        $PaymentEAVModel->Add();
    }
    if (isset($_POST["FieldTypeAdded"])) {
        $OptionsTypeModel->Type = $_POST["NewFieldType"];
        $OptionsTypeModel->Add();
    }

    if (isset($_POST["NewPaymentOption"]))
    {


        $POptionsModel->POption = $_POST['NewFieldName'];
        $POptionsModel->TypeID = $OptionsTypeModel->GetID($_POST['TypeOfFieldSelected'])[0];
        $POptionsModel->Add();
    }

    if (isset($_POST["attach"]))
    {
        $movie = $_POST['FieldNames'];
        foreach ($movie as $selectedOption)
        {
            $PaymentOptionsModel = new PaymentOptionsModel;
            $PaymentOptionsModel->PMID = $PaymentEAVModel->GetID($_POST['PaymentNamesSelector'])[0];
            $PaymentOptionsModel->POID = $POptionsModel->GetID($selectedOption)[0];
            $PaymentOptionsModel->Add();
        }
    }



?>

</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php
			include("Navigationbar2.php");
			?>
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
          <div class="form-grids row widget-shadow" data-example-id="basic-forms">
						<div class="form-title">
											<h4>New Payment</h4>
										</div>
						<div class="form-body">
							<form method="post" >
								<div class="form-group">
										<label> Payment Name</label>
										<input name="PaymentName"type="text" class="form-control" placeholder="eg: Mastercard ">
										<br>


										<input type="submit" name="PaymentNameAdded">
                                </div>
															</form>
															</div>


									<div class="form-title">
											<h4>New Field Type</h4>
										</div>
						    	<div class="form-body">
									<form method="post" >
									<div class="form-group">
									<label> Field Type </label>
									<input name="NewFieldType" type="text" class="form-control" placeholder="eg: int ">
									<br>
									<input type="submit" name="FieldTypeAdded">
									</div>
									</form>
									</div>


									<div class="form-title">
											<h4>New Field Name</h4>
										</div>
						    	<div class="form-body">
									<form method="post" >
									<div class="form-group">
									<label> Field Name </label>
									<input name="NewFieldName" type="text" class="form-control" placeholder="eg: Expiration Date ">
                                        <br/>
									<label>Field Type </label>

									<select name="TypeOfFieldSelected"  class="form-control" >

										<?php

										for ($x=0; $x<sizeof($OptionsTypeModel->View());$x++)
										{
											echo "<option value=".$OptionsTypeModel->View()[$x]."> ".$OptionsTypeModel->View()[$x]."</option>";


										}
										?>

									</select>
									<br>
									<input name="NewPaymentOption" type="submit">
									</div>
									</form>
									</div>

						<div class="form-title">
							<h4>Attach Fields</h4>
						</div>

							<div class="form-body">

							<form name="InField" method="post">
								<div class="form-group">
                                    <label>Payment Name </label>
									<select name="PaymentNamesSelector"  class="form-control" >
										<?php
										for ($x=0;$x<sizeof($PaymentEAVModel->View());$x++)
										{

											echo "<option value='".$PaymentEAVModel->View()[$x]."'> ".$PaymentEAVModel->View()[$x]."</option>";


										}
										?>
									</select>
                                    <br/>
									<label>Field Name</label>

										<select name="FieldNames[]"  class="form-control" multiple>

										<?php
										for ($x=0;$x<sizeof($POptionArr);$x++)
										{

											echo "<option value='".$POptionArr[$x]."'> ".$POptionArr[$x]."</option>";


										}
										?>
									</select>
									<br>


									<input name="attach" type="submit">
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
