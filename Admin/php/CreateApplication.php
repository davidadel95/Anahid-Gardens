<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Create Dynamic Application</title>
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

<?php
include_once "../Classes/AttributeType.php";
include_once "../Classes/NameEAV.php";
include_once "../Classes/Attribute.php";
$AttributeType=new AttributeType;
$NameEAV= new NameEAV;
$Attruibute = new Attribute;
$NumberOfValuesOfFields=$AttributeType->view();
$NumberOfValuesOfRoles= $NameEAV->view();
$NumberOfAttruibutes=$Attruibute->view();
if (isset($_POST["RoleNameAdded"])) {

$NameEAV->Name= $_POST["RoleName"];
$NameEAV->Add();
header ("Location: CreateApplication.php");
}
if (isset($_POST["FieldTypeAdded"])) {

$AttributeType->Type=$_POST["NewField"];
$AttributeType->Add();
header ("Location: CreateApplication.php");
}

if (isset($_POST["NewApplicationOption"])){

$Attruibute->AttributeType=$_POST["TypeOfFieldSelected"];
$Attruibute->Type=$_POST["FieldNameAdded"];
$Attruibute->Add();
header ("Location: CreateApplication.php");

}


?>

</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php include("Navigationbar2.php"); ?>
    </div>

		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
				<?php //include("Header.php"); ?>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
    <div id="page-wrapper">
			<div class="main-page">
        <div class="forms">
          <div class="form-grids row widget-shadow" data-example-id="basic-forms">

						<div class="form-title">
							<h4>New Role</h4>
						</div>
						<div class="form-body">
							<form method="post" >
								<div class="form-group">
										<label> Role Name </label>
										<input name="RoleName"type="text" class="form-control" placeholder="eg: Student ">
										<br>

										<input type="submit" name="RoleNameAdded">
                                </div>
															</form>
															</div>


									<div class="form-title">
											<h4>New Type</h4>
										</div>
						    	<div class="form-body">
									<form method="post" >
									<div class="form-group">
									<label> Field Type </label>
									<input name="NewField" type="text" class="form-control" placeholder="eg: Student ">
									<br>
									<input type="submit" name="FieldTypeAdded">
									</div>
									</form>
									</div>


									<div class="form-title">
											<h4>New Field</h4>
										</div>
						    	<div class="form-body">
									<form method="post" >
									<div class="form-group">
									<label> Field Name </label>
									<input name="FieldNameAdded" type="text" class="form-control" placeholder="eg: Student ">
									<label>Field Type </label>

									<select name="TypeOfFieldSelected"  class="form-control" >

										<?php
										for ($x=0;$x<=$NumberOfValuesOfFields;$x++)
										{

											echo "<option value='".$AttributeType->Types[$x]."'> ".$AttributeType->Types[$x]."</option>";


										}
										?>

									</select>
									<br>
									<input name="NewApplicationOption" type="submit">
									</div>
									</form>
									</div>

						<div class="form-title">
							<h4>In Fields</h4>
						</div>

							<div class="form-body">

							<form name="Options">
								<div class="form-group">
									<label>Field Name</label>

									<select name="TypeOfField"  class="form-control" >

										<?php
										for ($x=0;$x<=$NumberOfAttruibutes;$x++)
										{

											echo "<option value='".$Attruibute->Types[$x]."'> ".$Attruibute->Types[$x]."</option>";


										}
										?>
									</select>
									<br>

									<label>Role Name </label>
									<select name="TypeOfField"  class="form-control" >
										<?php
										for ($x=0;$x<=$NumberOfValuesOfRoles;$x++)
										{

											echo "<option value='".$NameEAV->Names[$x]."'> ".$NameEAV->Names[$x]."</option>";


										}
										?>
									</select>
									<br> <br>
									<input type="submit">
								</div>
							</form>
					</div>






					<div class="form-title">
						<h4>Out Fields</h4>
					</div>

						<div class="form-body">

						<form name="Options">
							<div class="form-group">
								<label>Field Name</label>
								<select name="TypeOfField"  class="form-control" >

								<option value="varchar">Text</option>
								<option value="Integer">Integer</option>
								<option value="Float">Decimel</option>
								<option value="Boolean">Yes Or No</option>
								</select>
								<br>

								<label>Role Name </label>
								<select name="TypeOfField"  class="form-control" >

									<?php
									for ($x=0;$x<=$NumberOfValuesOfRoles;$x++)
									{

										echo "<option value='".$NameEAV->Names[$x]."'> ".$NameEAV->Names[$x]."</option>";


									}
									?>
								</select>
								<br> <br>
								<input type="submit">
							</div>
						</form>
				</div>

					<div class="form-title">
						<h4>Pages For this role</h4>
					</div>

						<div class="form-body">

						<form name="Options">
							<div class="form-group">

								<label> Pages </label>
								<select name="TypeOfField"  class="form-control" >

								<option value="varchar">Text</option>
								<option value="Integer">Integer</option>
								<option value="Float">Decimel</option>
								<option value="Boolean">Yes Or No</option>
								</select>
								<br> <br>
								<label>Role Name </label>
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
