<?php

//if not logged in redirect to login
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['userID']))
{
    // not logged in
    header('Location: Login.php');
    exit();
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Anahid Gardens - Add Song</title>
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
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Course.php";

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
                      <h2>New Lesson</h2>
                  </div>
                  <div class="form-body">
                      <form method="POST" action="">
                          <div class="form-group">
                              <label>Course </label>
                              <?php

                              $Course= new Course;
                              $result = $Course->View();
                              echo "<select name='courseID' class='form-control'>";
                              while($row =mysqli_fetch_array($result)){
                                  echo "<option value='".$row["ID"]."'>" .$row["Name"]."</option>" ;

                              }
                              echo "</select>"
                              ?>
                          </div>

                          <div class="form-group">
                            <label>Lesson Name</label>
                            <input name="lessonName" type="text" class="form-control" placeholder="eg: Frere Jacques">
                        </div>
                        <div class="form-group">
                          <label>Lesson Details</label>
                          <input name="lessonDetails" type="text" class="form-control" placeholder="Details">
                        </div>
                        <button type="submit" class="btn btn-success">Confirm</button>
                      </form>
                  </div>
              </div>
                <?php
                if($_POST){
//                          print_r($_POST);
                    require_once "Model/CurriculumModel.php";
                    $curriculum = new CurriculumModel();
                    $curriculum->CourseID = $_POST["courseID"];
                    $curriculum->LessonName = $_POST["lessonName"];
                    $curriculum->LessonDetails = $_POST["lessonDetails"];
                    $curriculum->Add();
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
