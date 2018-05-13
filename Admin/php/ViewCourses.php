
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Course.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CurriculumModel.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>View Courses</title>
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
<link href="../css/custom.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="../js/jquery.min.js"></script>

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

    <h4>View Courses </h4>
    <script  src="../js/index1.js"></script>

		<div class="forms">
			<div class="mid-content-top charts-grids">
				<div class="form-group">
                    <label>Course</label>
						<?php
							$course = new Course;
							$noOfCourses= $course->View();

                            echo "<select name='courseID' class='form-control' onchange='David(this.value)' id='courseID'>";
                            for ($i=0; $i<=$noOfCourses; $i++){
                                echo "<option value='".$course->ID[$i]."'> ".$course->Name[$i]."</option>";
                            }
                            echo "</select>"
						?>
				    </div>
                    <div class="form-group" id="ajax">
                          <?php
                                  $curriculum = new CurriculumModel();
                                  $curriculum->View();
    $numberOfLessons = $curriculum->ViewSpecificLesson($course->ID[0]);
    if($numberOfLessons>-1){


    if ($numberOfLessons < 0){
        echo "</br>";
        echo "<label style='color: red'><strong>No available lessons, please add one first</strong></label>";
    }else{
        echo "<label>Lesson Name </label>";
        echo "<br>";
        echo "<select name=\"lessonID\" id=\"lessonID\" class=\"form-control\" onchange='David2(this.value)' >";
        for ($i =0; $i<=$numberOfLessons; $i++){
            echo "<option value='".$curriculum->ID[$i]."'> ".$curriculum->LessonName[$i]."</option>";
        }
        echo "</select>";
    }
                                ?>


                    <div class="form-group" id="ajax2">
  <?php


        $numberOfLessons = $curriculum->viewLessonDetails($curriculum->ID[0]);
        if ($numberOfLessons < 0){
            echo "</br>";
            echo "<label style='color: red'><strong>No available lesson detail, please add lesson detail</strong></label>";
        }else{
            echo "<label>Lesson Details </label>";
            for ($i =0; $i<=$numberOfLessons; $i++){
                echo "<h2>".$curriculum->LessonDetails[$i]."</h2>";
            }
        }

}
                        ?>
            </div>
</div>
					<!--//sreen-gallery-cursual---->
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

                function David(x) {



                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("ajax").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "AjaxViewLessonNamee.php?courseID=" + x, true);
                    xmlhttp.send();
                }

            function David2(x) {



                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax2").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "AjaxViewLesson.php?lessonID=" + x, true);
                xmlhttp.send();
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
