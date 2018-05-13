
<!DOCTYPE HTML>
<html>
<head>
<title>Anahid Gardens - View Encryption</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<style>

</style>


</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php include("ChildNavbar.php"); ?>
    </div>

		<!--left-fixed -navigation-->
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentRating.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CurriculumModel.php";
 ?>
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
                      <h2>View Ratings</h2>
                  </div>
                  <div class="form-body">
                      <form method="POST" action="">
                          <div class="form-group">
                              <label>Date</label>
                              <input type="Date" class="form-control" name='Date'>
                        </div>
                        <button type="submit" class="btn btn-success">Confirm</button>
                      </form>
                  </div>
              </div>
                <?php
                if($_POST){ 
                  $StudentRating=new StudentRating;
									$SelectedDate = $_POST['Date'];
									$UserID= $_SESSION['userID'];
									$Counter= $StudentRating->ViewSpecificChildForDay($UserID,$SelectedDate);
									if( $Counter==-1){
										echo "No Avaliable Grades For This Day";
									}
									else{

													echo	'	<div class="tables">';
													echo 	'<div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">';
                                                    
													echo	'<h4>Rating</h4>';
													echo	'<table class="table table-hover">';
													echo 	'<thead>';
													echo 	'<tr>';
													echo  '<th>Course Name</th>';
													echo 	'<th>Lesson Name</th>';
													echo  '<th>Rating<th>';
													echo	'</tr>';
													echo	'	</thead>
																<tbody>';
													for ($x=0;$x<=$Counter;$x++){
													$Curriculum = new CurriculumModel;
													$Curriculum->viewLessonDetails($StudentRating->CurriculumID[$x]);
													echo "<tr>";
													echo "<td>".$Curriculum->LessonName[$x]."</td>";
													echo "<td>".$Curriculum->LessonDetails[$x]."</td>";
													echo "<td>".$StudentRating->Rating[$x]." Out Of 5</td>";
													echo "</tr>";
													}

																echo '</tbody>
                                                                </div><a href="reportPDF.php" target="_blank" onclick="view()" class="btn btn-success">Print</a>
														</table>
												</div>
										</div>';
											}


									}

                ?>
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
            function view()
            {
                var date = '<?php echo $SelectedDate; ?>';
                document.cookie = "cookieReportDate=" + date;
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
