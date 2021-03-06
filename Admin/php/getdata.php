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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Edit About Us</title>
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


</head>
<body class="cbp-spmenu-push">
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
?>
<?php


$db = dbconnect::getInstance();
$mysqli = $db->getConnection();
$sql_query = "SELECT * FROM Pages INNER JOIN PagesHTML ON Pages.ID = PagesHTML.PagesID WHERE Pages.Name='Contact Us' ";
$result = $mysqli->query($sql_query);
if($row=mysqli_fetch_array($result)){
    $html = $row["HTML"];
    $id=$row["PagesID"];
}
if($_POST)
{
    $NewHtml=$_POST["newhtml"];
    // $NewHtml = trim($NewHtml);
    // $NewHtml = stripslashes($NewHtml);
    // $NewHtml = htmlspecialchars($NewHtml);
    $sql_query = "UPDATE PagesHTML
			SET HTML = '$NewHtml'
			WHERE PagesID='$id';";
    $result = $mysqli->query($sql_query);
    header('Location: Dashboard.php');
    exit();
}

?>

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
							<h4>Edit About Us</h4>
						</div>
						<div class="form-body">
							<form method="post" >
								<div class="form-group">
                    <textarea  name="newhtml" class="tinymce" id="texteditor"> <?php echo $html; ?> </textarea>
										<br>
										<input type="submit" value="Change">
                </div>
								</form>
                </div>
                </div>
                </div>
            </div>
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
	<script type="text/javascript" src="CDO/plugin/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="CDO/plugin/tinymce/init-tinymce.js"></script>
	<script type="text/javascript" src="CDO/js/getdata.js"></script>
	<!--//scrolling js-->

	<!-- Bootstrap Core JavaScript -->
   <!-- <script src="js/bootstrap.js"> </script> -->
	<!-- //Bootstrap Core JavaScript -->

</body>
</html>
