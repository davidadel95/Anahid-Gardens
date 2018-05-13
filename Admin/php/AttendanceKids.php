
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
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Classes.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentClass.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/AttendanceModel.php";
		 ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
        <div class="tables">
          <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
              <?php
                $classID = $_REQUEST['id'];
                $class = new Classes();
                $className = $class->getClassName($classID);
//                date_default_timezone_set('Africa/Cairo');
                $dateWithTime = date('Y-m-d H:i:s', time());
              ?>
              <h4>Date: <strong><?php echo $dateWithTime; ?></strong></h4>
            <h4>Name of the class: <?php echo "$className"; ?></h4>

                    <?php

                    $students = new StudentClass();
                    $numberOfChildrenInClass = $students->viewClassFromClassID($classID);
                    $i=1;
                    $user = new User;
                    $attended = new AttendanceModel();
                    $date = date('Y-m-d', time());
                    $numberOfAttended = $attended->showAttendanceByDate($date);
                    $Count=-1;

                    for ($j = 0; $j<= $numberOfChildrenInClass; $j++){
                        $numberOfUsers = $user->viewChildForClassAndAttendance($students->UserID[$j]);
//                        echo $date;
//                        echo $userResult;
                        for($Counter1=0;$Counter1<=$numberOfUsers;$Counter1++) {
                            $isUsed=False;
                            for ($Counter2=0;$Counter2<=$numberOfAttended;$Counter2++){
                                if($user->Value[$Counter1]==$attended->UserID[$Counter2]) {
                                    //  echo $Counter2;
                                    $isUsed=True;
                                }
                            }
                            if($isUsed==False) {
                                $Count+=1;
                                $NotAttendedStudents[$Count]=$user->Value[$Counter1];
                                $userIDs[$Count]=$user->UserID[$Counter1];

                            }
                        }
                    }

                    if ($Count >= 0){
                        echo "
                            <table class=\"table table-hover\">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Attendance</th>
                                </tr>
                              </thead>
                              <tbody>
                                <form name =\"Attendence\" method=\"post\">
                        ";
                        for ($index = 0; $index<=$Count; $index++){
                            echo "<tr>";
                            echo "<th>$i</th>";
                            echo "<td>" . $NotAttendedStudents[$index] . "</td>";
                            echo "<td></td>";
                            echo "<td><input type=\"checkbox\" name=\"attendee[]\" id='attendee' value=" . $userIDs[$index] . "></td>";
                            echo "</tr>";
                            $i++;
                        }
                        echo " </tbody>
                                </table>
                                <input type=\"submit\" class=\"btn btn-success\">
                                </form>
                                ";
                    }else{
                        echo "<tr><h4 style='color: red'><strong>Attendance for this day is taken</strong></h4></tr>";
                    }

                    ?>
              <?php
                  if (isset($_POST['attendee'])) {
                      $student = $_POST['attendee'];
                      $attendance = new AttendanceModel();
//                      echo "The following users attended <br>";
                      foreach ($student as $attended){
//                          echo $attended."<br />";
                          $attendance->UserID = $attended;
                          $attendance->Date = $dateWithTime;
                          $attendance->Attended = 1;
                          $attendance->Add();
                          echo "<meta http-equiv='refresh' content='0'>";
                      }
                  }
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
