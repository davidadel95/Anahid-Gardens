<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Add Coures Timetable</title>
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
          <div class="form-grids row widget-shadow" data-example-id="basic-forms">
						<div class="form-title">
							<h4>Add Class Timetable</h4>
						</div>

						<div class="form-body">
							<form method="post">
								<div class="form-group">
                  <label>Course </label>
                  <?php
										include_once "../Classes/Course.php";
										$Course= new Course;
										$result = $Course->View();
										echo "<select name='CourseID' class='form-control'>";
										while($row =mysqli_fetch_array($result)){
															echo "<option  value='".$row["ID"]."'>" .$row["Name"]."</option>" ;

										 }
										 echo "</select>"

									?>
                </div>

								<div class="form-group">
                  <label>Class</label>
									<?php
										include_once "../Classes/Classes.php";
										$Classes= new Classes;
										$result = $Classes->View();
										echo "<select name='ClassID' id='ClassID' class='form-control'>";
										while($row =mysqli_fetch_array($result)){
											echo "<option value='".$row["ID"]."'>" .$row["Name"]."</option>" ;

										 }
										 echo "</select>"

									?>
									</div>

									<div class="form-group">
		                  <label>Days</label>
		             				<?php

												include_once "../Classes/Days.php";
												$Days= new Days;
												$result = $Days->View();
												echo "<select name='DaysID' onchange='shaf3y(this.value,document.getElementById('ClassID').value)' class='form-control'>";
												while($row =mysqli_fetch_array($result)){
														echo "<option value='".$row["ID"]. "'>" .$row["Name"]."</option>" ;

												 }
												 echo "</select>"

								  			?>
											</div>
	                <div class="form-group">
                  <label>Time Slot</label>

									<?php

									include_once "../Classes/TimeSlots.php";
									$TimeSlots= new TimeSlots;
									$result = $TimeSlots->View();

									include "../Classes/TimeTable.php";
									$TimeTable = new TimeTable;
								 	$TimeTable->ShowAvailableSlots(1,1);



									// echo "<select name='TimeSlotsID' class='form-control'>";
									// while($row =mysqli_fetch_array($result)){
									// 		echo "<option value='".$row["ID"]. "'>" .$row["Begin"]. " ~ " . $row["End"] ."</option>" ;
									//
									//  }
									//  echo "</select>"
                                           echo "<div id='ajax'>" ;
									 echo "<select name='TimeSlotsID' class='form-control'>";
									 echo $TimeTable->Count;
									 for ($i=0;$i<=$TimeTable->Count;$i++)
									 	{

											 echo "<option>" .$TimeTable->AvailabeSlots[$i]."</option>" ;

										}
										echo "</select>
                                        </div>"
									 	?>
                </div>



                <input type="submit" class="btn btn-success">

              </form>

							<?php
								if($_POST){

									$TimeTable->CourseID= $_POST['CourseID'];
									$TimeTable->ClassID= $_POST['ClassID'];
									$TimeTable->DaysID= $_POST['DaysID'];
									$TimeTable->TimeslotsID= $_POST['TimeSlotsID'];
									$TimeTable->Add();


								}
							?>

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
            function shaf3y(x,y) {

        //var x = document.getElementById("mySelect").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
         }
        };
        xmlhttp.open("GET", "TimeTableAjax.php?q=" + x +"&w=" + y, true);
        xmlhttp.send();
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
