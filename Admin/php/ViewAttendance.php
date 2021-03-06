
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="../css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
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
        <?php
        $rootPath = $_SERVER['DOCUMENT_ROOT'];

        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/AttendanceModel.php";
        ?>

		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
				<?php include("Header.php"); ?>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
        <div class="tables">
          <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>Select Day:</h4>
              <form method="post">
                  <input type="date" name="dateChosen">
                  <input type="submit" class="btn btn-success">
              </form>
	         <table class="table table-hover">
                 <thead>
                 <tr>
                     <th>#</th>
                     <th>First Name</th>
                     <th>Date</th>
                     <th>Attendance</th>
                 </tr>
                 </thead>
                 <tbody>
                     <?php
                     if (isset($_POST['dateChosen'])){
                         if ($_POST['dateChosen'] != null){
                             $attendance = new AttendanceModel();
                             $result = $attendance->showAttendanceByDate($_POST['dateChosen']);
                             //number of students returned from db
//                             $row =mysqli_fetch_array($result);
                             $j = 1;

                             if ($result == -1){
                                 echo "<tr><h4 style='color: red'><strong>No students in this date</strong></h4></tr>";
                             }else{
                                 $i=1;
                                 for ($i=0;$i<=$result;$i++){
                                     echo "<tr>";
                                     echo "<th>".$j."</th>";
                                     echo "<td>".$attendance->UserID[$i]."</td>";
                                     echo "<td>".$attendance->Date[$i]."</td>";
                                     echo "<td>".$attendance->Attended[$i]."</td>";
                                     echo "</tr>";
                                     $j++;
                                 }
                             }
                         }else{
                             echo "<h4 style='color: red'><strong>Please enter the date</strong></h4>";
                         }
                     }else{
                         echo "<h4 style='color: red'><strong>Please enter the date</strong></h4>";
                     }
                     ?>
                 </tbody>
			 </table>
          </div>
        </div>
			</div>
		</div>
	<!--footer-->
	<div class="footer">
	   <?php include("Footer.php"); ?>
	</div>


</body>
</html>
