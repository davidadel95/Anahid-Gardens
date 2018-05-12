
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Add Students Class</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() {
	 setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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
      <?php
			include("Navigationbar2.php");
			 ?>
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
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentClass.php";

        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Classes.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentClass.php";


        ?>
		<!-- //header-ends -->
		<!-- main content start-->
    <div id="page-wrapper">
			<div class="main-page">
        <div class="forms">
          <div class="form-grids row widget-shadow" data-example-id="basic-forms">
						<div class="form-title">
							<h4>Add Student Class</h4>
						</div>

						<div class="form-body">
							<form method="post">
								<div class="form-group">
                  <?php
                  $StudentClass= new StudentClass;
                  $User = new User;
                  $StudentClass->ShowChildWithoutClasses();

                  for($i=0;$i<=$StudentClass->Count;$i++){

                  $result=$User->GetNameOfChild($StudentClass->ChildrenWithoutClasses[$i]);
                  $row =mysqli_fetch_array($result);
                  $Names[$i]= $row["Value"];
                  }
                      if ($i>0){
                  echo '<label>Students </label>';
	                 echo "<select name='ChildID' class='form-control'>";


															 for($x=0;$x<=$StudentClass->Count;$x++)
 														 	echo "<option value='".$StudentClass->ChildrenWithoutClasses[$x]." '>" .$Names[$x]."</option>" ;
										 echo "</select>";
                     echo '<div class="form-group">';
                     echo '<label>Class</label>';
                     $Classes= new Classes;
  										$result = $Classes->View();
  										echo "<select name='ClassID' id='ClassID'  class='form-control'>";
  										$x=-1;
										while($row =mysqli_fetch_array($result)){
											$x++;
											$ClassIDs[$x]=$row["ID"];
											echo "<option value='".$row["ID"]."'>" .$row["Name"]."</option>" ;

										 }
										 echo "</select>";
                     echo ' </div>';
                     echo '<input type="submit" value="Submit" class="btn btn-success">';
                    }
                    else
                    echo "No Children Without Classes";

									?>
                </div>




              </form>

							<?php
								if($_POST){

									$StudentClass->UserID=$_POST["ChildID"];
									$StudentClass->ClassID=$_POST["ClassID"];
									$StudentClass->Add();
								  echo "<meta http-equiv='refresh' content='0'>";


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
