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
<title>View Avaliable Courses For Teacher</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<style>

</style>

</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php include("TeacherNavbar.php"); ?>
    </div>

		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
				<?php include("Header2.php"); ?>
		</div>
		<?php
        $rootPath = $_SERVER['DOCUMENT_ROOT'];

        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Course.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Classes.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CourseTimeTable.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EncryptionDecrptionClass.php";
		 ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
                <script  src="../js/index1.js"></script>
                <div class="forms">
                  <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                    <div class="form-title">
                      <h4>Available Courses And Classes</h4>
                    </div>
                    <div class="form-body">
                      <?php
                          $CourseTimeTable = new CourseTimeTable;
                          $Class = new Classes;
                          $Course = new Course;
                          $result= $CourseTimeTable->GetSpecificTeacher($_SESSION['userID']);
                          $Counter=-1;
                          while ($row= mysqli_fetch_array($result)){
                            $Counter++;
                            $CourseID[$Counter]=$row['CourseID'];
                            $ClassIDs[$Counter]=$row['ClassID'];
                            $IDs[$Counter]=$row['ID'];


                          }
                          $CourseTimeTable->GetOneRecord($CourseID,$ClassIDs,$Counter);

                          if($CourseTimeTable->newCounter==0){
                              $CourseID[0]=$CourseTimeTable->CourseIDs[0];
                              $ClassIDs[0]=$CourseTimeTable->ClassIDs[0];
                              $ClassName[0]=$Class->getClassName($ClassIDs[0]);
                              $CourseNameresult=$Course->ViewSpecificCourse($CourseID[0]);
                              while ($row = mysqli_fetch_array($CourseNameresult)){
                                $CourseName[0] = $row['Name'];

                                }
                          }
                          else {
                          for($i=0;$i<=$CourseTimeTable->newCounter;$i++){

                            $CourseNameResult[$i]=$Course->ViewSpecificCourse($CourseTimeTable->CourseIDs[$i]);
                            while ($row1= mysqli_fetch_array($CourseNameResult[$i])){
                              $CourseName[$i]=$row1['Name'];
                              $CourseID[$i]=$row1['ID'];
                            }
                            $ClassName[$i]=$Class->getClassName($CourseTimeTable->ClassIDs[$i]);
                          }

                          }
                        


                              ?>
                      <h4>  <label>Courses And Classes</label></h4>
                        <table class="table table-hover">
                        <?php

                        $Encryption = new EncryptionDecrptionClass;
                        $Encryption->ReadFromFile();
                          for ($x=0;$x<=$CourseTimeTable->newCounter;$x++){
                            echo "<tr>";
                            $newClassID=$Encryption->Encrypt($CourseTimeTable->ClassIDs[$x]);
                            $newClassID = urlencode($newClassID);
                            echo "<td> <a href=\"ChildsClass.php?Classid=".$newClassID.'&xx='.$CourseID[$x]."\"> ".$CourseName[$x]." ".$ClassName[$x]." </a> </td>";
                            echo "</tr>";

                                  }
                                  ?>
                 			 </table>



                        <br>
                        <div class="form-group">
                            <form method="post">

                                <input type="submit" class="btn btn-success" value="Confirm">
                            </form>
                        </div>
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

    function shaf3y(x) {

        //var x = document.getElementById("mySelect").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
         }
        };
        xmlhttp.open("GET", "ajax.php?q=" + x, true);
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
