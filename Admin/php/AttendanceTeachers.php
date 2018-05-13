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
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->

 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->

<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<script  src="js/index1.js"></script>
<link href="css/custom.css" rel="stylesheet">
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
        $rootPath = $_SERVER['DOCUMENT_ROOT'];

        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/AttendanceModel.php";

        ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
        <div class="tables">
          <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
              <?php $dateWithTime = date('Y-m-d H:i:s', time());
              $date = date('Y-m-d', time());
              ?>
              <h4>Date: <strong><?php echo $dateWithTime; ?></strong></h4>
            <h4>Workers:</h4>

<!--              --><?php
//
//              $getAttendanceID = new AttendanceModel();
//
//              $attendanceID = $getAttendanceID->showAttendanceByDateForWorkers($date);
//
//              echo "number :" . $attendanceID;
//              ?>

                    <?php
                    echo "<div id='ajax'>";

                    echo "
                    <table class=\"table table-hover\">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>User ID</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                    ";
                        $user = new User();
                        $numberOfUsers = $user->showAllUsersWithoutChilds();
                        $count = 1;

                        $getAttendanceID = new AttendanceModel();

//                        $attendanceID = $getAttendanceID->showAttendanceByDateAndID($date,$id);


                        for ($i = 0; $i<= $numberOfUsers; $i++){
                            $attendanceID = $getAttendanceID->showAttendanceByDateAndID($date,$user->UserID[$i]);

                            echo "<tr>";
                            echo "<th>$count</th>";
                            echo "<td>" . $user->Value[$i] . "</td>";
                            echo "<td>" . $user->UserID[$i] . "</td>";
                            if (!isset($attendanceID[$i])){
                                echo "<td><button class='btn btn-success' type='button' onclick='checkIn(".$user->UserID[$i].")' name='Formbtn'>Check in</button></td>";
                            }else{
                                echo "<td>Checked In</td>";
                            }
//                            echo "<td><button class='btn btn-success' type='button' onclick='checkIn(".$user->UserID[$i].")' name='Formbtn'>Check in</button></td>";

                            echo "<td><button class='btn btn-dark' type='button' onclick='checkOut(".$user->UserID[$i].")' name='Formbtn'>Check out</button></td>";
                            echo "</tr>";
                            $count++;
                        }

                        echo "
                           </tbody>
                        </table>
                        ";
                        echo "</div>";
                    ?>

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
</body>

<script>
    function checkIn(x) {

        //var x = document.getElementById("mySelect").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajaxAttendanceCheckIn.php?userID=" + x, true);
        xmlhttp.send();
    }
    function checkOut(x) {

        //var x = document.getElementById("mySelect").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajaxAttendanceCheckOut.php?userID=" + x, true);
        xmlhttp.send();
    }


</script>
</html>

