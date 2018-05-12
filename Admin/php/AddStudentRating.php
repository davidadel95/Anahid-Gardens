
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Course.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentRating.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CurriculumModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EncryptionDecrptionClass.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Student Rating</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="../css/font-awesome.css" rel="stylesheet">

<style>
    @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

    * {
      margin: 0;
      padding: 0;
      font-family: roboto;
    }


    .cont {
      width: 93%;
      max-width: 350px;
      text-align: center;
      margin: 4% auto;
      padding: 30px 0;
      background: #111;
      color: #EEE;
      border-radius: 5px;
      border: thin solid #444;
      overflow: hidden;
    }

    hr {
      margin: 20px;
      border: none;
      border-bottom: thin solid rgba(255,255,255,.1);
    }

    div.title { font-size: 2em; }

    h1 span {
      font-weight: 300;
      color: #Fd4;
    }

    div.stars {

      display: inline-block;
    }

    input.star { display: none; }

    label.star {
      float: right;
      padding: 10px;
      font-size: 36px;
      color: #444;
      transition: all .2s;
    }

    input.star:checked ~ label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }
</style>
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

    <h4>Add Student Rating </h4>
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
                          echo " <form method='post'>";
                                  $curriculum = new CurriculumModel();
                                  $curriculum->View();
    $numberOfLessons = $curriculum->ViewSpecificLesson($course->ID[0]);


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
          echo "<br>";
            echo "<label>Lesson Details </label>";
            for ($i =0; $i<=$numberOfLessons; $i++){
                echo "<h2>".$curriculum->LessonDetails[$i]."</h2>";
            }
        }
        echo "<br>";
        echo "<label>Rating </label>";


          echo ' <div class="form-group">';
            echo '<div class="stars">';
            $StudentRating = new StudentRating;
            $EncryptionAndDecreption = new EncryptionDecrptionClass;
            $StudentRating->UserID=$_REQUEST['id'];
            $EncryptionAndDecreption->ReadFromFile();
            $StudentRating->UserID=$EncryptionAndDecreption->Decrept($StudentRating->UserID);
            $numberofstars=$StudentRating->GetNumbersOfStars();
            for ($counter=$numberofstars;$counter>=1;$counter--)
            {
                echo '<input class="star"  value="'.$counter .'" id="star-'. $counter.'-2" type="radio" name="star"/>';
                echo '<label class="star" for="star-'.$counter.'-2"></label>';
            }
        echo '</div>';
        echo '</div>';
        echo '  <button type="submit" class="btn btn-success">Submit</button>';
        echo "</form>";
                        ?>

            </div>
</div>



              <?php
                if($_POST){

                  $StudentRating->CurriculumID=$_POST["lessonID"];
                  $StudentRating->Rating=$_POST['star'];
                  $StudentRating->Add();

                }


              ?>
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
                    xmlhttp.open("GET", "AjaxViewLessonName.php?courseID=" + x, true);
                    xmlhttp.send();
                }

            function David2(x) {



                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ajax2").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "AjaxViewLessonDetails.php?lessonID=" + x, true);
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
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46156385-1', 'cssscript.com');
    ga('send', 'pageview');

  </script>
</body>
</html>
