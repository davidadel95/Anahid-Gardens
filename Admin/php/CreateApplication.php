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



</head>
<body class="cbp-spmenu-push">
<?php

require_once "includes.php";


$AttributeType=new AttributeType;
$RoleNameEAV= new RoleNameEAV;
$Attruibute = new Attribute;
$RoleAttributes= new RoleAttributes;
$Pages = new Page;
$Visibility = new Visibilty;
$NumberOfPages = $Pages->view();
$NumberOfValuesOfFields=$AttributeType->view();
$NumberOfValuesOfRoles= $RoleNameEAV->view();
$NumberOfAttruibutes=$Attruibute->view();
if (isset($_POST["RoleNameAdded"])) {

    $RoleNameEAV->Name= $_POST["RoleName"];
    $RoleNameEAV->URL="../php/" .$_POST["Page"]. '.php';
    $RoleNameEAV->Add();
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
    $SQLRETURNED = $Attruibute->Add();
    header ("Location: CreateApplication.php");

}

if (isset($_POST["NewInField"])){

    $FieldName =$_POST["InFiledFieldName"];
    $RoleName =$_POST["InFiledRoleName"];
    $RoleID = $RoleNameEAV->GetID($RoleName);
    $FieldID = $Attruibute->GetID($FieldName);
    $Visibility->RoleID = $RoleID;
    $Visibility->FieldID = $FieldID;
    $Visibility->IsVisible=1;
    $Visibility->Add();
    header ("Location: CreateApplication.php");
}
if (isset($_POST["NewOutField"])){

    $FieldName =$_POST["OutFiledFieldName"];
    $RoleName =$_POST["RoleTypeOfField"];
    $RoleID = $RoleNameEAV->GetID($RoleName);
    $FieldID = $Attruibute->GetID($FieldName);
    $Visibility->RoleID = $RoleID;
    $Visibility->FieldID = $FieldID;
    $Visibility->IsVisible=0;
    $Visibility->Add();
    header ("Location: CreateApplication.php");


}



?>
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
							<h4>New Role
						</h4>

						</div>
						<div class="form-body">
							<form method="post" >
								<div class="form-group">
										<label> Role Name</label>
										<input name="RoleName"type="text" class="form-control" placeholder="eg: Student ">
										<br>
										<label> Page To Redirect on </label>

										<select name="Page" class="form-control">
										<?php
										for ($x=0;$x<=$NumberOfPages;$x++)
										echo "<option value='".$Pages->Names[$x]."'> ".$Pages->Names[$x]."</option>";
 										?>
										</select>
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

							<form name="InField" method="post">
								<div class="form-group" id="GroupAjax">
									<label>Field Name</label>
                                    
										<select name="InFiledFieldName"  onchange="GroupAjax(this.value)" class="form-control" >
                                            
										<?php
                                            
										for ($x=0;$x<=$NumberOfAttruibutes;$x++)
										{
                                            
											echo "<option value='".$Attruibute->Types[$x]."'> ".$Attruibute->Types[$x]."</option>";


										}
                                         /*   $result=$RoleNameEAV->GetRadio();
                                            while($row=mysqli_fetch_array($result)){
                                            if(!strcmp($Attruibute->Types[$x],$row['Name']))
                                            echo "<input type='hidden' value='".$row["Type"]."'>";}*/
										?>
									</select>
                                    </div>
                                    <br>
                                    

									<label>Role Name </label>
									<select name="InFiledRoleName"  class="form-control" >
										<?php
										
                                        for ($x=0;$x<=$NumberOfValuesOfRoles;$x++)
										{

											echo "<option value='".$RoleNameEAV->Names[$x]."'> ".$RoleNameEAV->Names[$x]."</option>";


										}
										?>
									</select>
									<br> <br>
									<input name="NewInField" type="submit">
								</div>
							</form>
					</div>






					<div class="form-title">
						<h4>Out Fields</h4>
					</div>

						<div class="form-body">

						<form method="post" >
							<div class="form-group">
								<label>Field Name</label>
								<select name="OutFiledFieldName"  class="form-control" >
								<?php
								for ($x=0;$x<=$NumberOfAttruibutes;$x++)
								{
								echo "<option value='".$Attruibute->Types[$x]."'> ".$Attruibute->Types[$x]."</option>";
								}
								?>
							 </select>
								<br>

								<label>Role Name </label>
								<select name="RoleTypeOfField"  class="form-control" >

									<?php
									for ($x=0;$x<=$NumberOfValuesOfRoles;$x++)
									{

										echo "<option value='".$RoleNameEAV->Names[$x]."'> ".$RoleNameEAV->Names[$x]."</option>";


									}
									?>
								</select>
								<br> <br>
								<input type="submit" name="NewOutField">
							</div>
						</form>
				</div>

					<!-- <div class="form-title">
						<h4>Pages For this role</h4>
					</div>

						<div class="form-body">

						<form name="Options">
							<div class="form-group">

								<label> Pages </label>
								<select name="TypeOfField"  class="form-control" >
									<?php
									for ($x=0;$x<=$NumberOfPages;$x++)
									{

										echo "<option value='".$Pages->Names[$x]."'> ".$Pages->Names[$x]."</option>";


									}
									?>

								</select>
								<br> <br>
								<label>Role Name </label>
								<select name="TypeOfField"  class="form-control" >

									<?php
									for ($x=0;$x<=$NumberOfValuesOfRoles;$x++)
									{

										echo "<option value='".$RoleNameEAV->Names[$x]."'> ".$RoleNameEAV->Names[$x]."</option>";


									}
									?>
								</select>
								<br> <br>
								<input type="submit">
							</div>
						</form>
				</div> -->



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
            function GroupAjax(x) {

        

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("GroupAjax").innerHTML = this.responseText;
         }
        };
        xmlhttp.open("GET", "GroupAjax.php?q=" + x, true);
        xmlhttp.send();
    }
                
		</script>
<script>
    var counter=1;
    function AddAnotherButton(){

//document.getElementById("Shaf3y").addEventListener("click", Shaf3y);

  document.getElementById('Shaf3yy').innerHTML += '<input name='+counter+'> <br>' ;
  counter++;
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