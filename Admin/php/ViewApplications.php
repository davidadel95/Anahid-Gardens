<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EventModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleEAV.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Event.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Applicant.php";

$RoleNameEAV = new RoleNameEAV;
$RoleEav = new RoleEav;
$RoleEav->RoleID = $RoleNameEAV->GetID("Teacher");
$Applicant = new Applicant("Someone Applied");
$Applicant->attach(new User);
if(isset($_POST['post'])){
    header('location:ViewApplications.php');
}
?>
<html>
<head>
<title>Show Applications</title>
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


    <script  src="js/index1.js"></script>
    <div class="forms">
      <div class="form-grids row widget-shadow" data-example-id="basic-forms">

        <div class="form-title">
          <h4>New Application
        </h4>

        </div>
        <div class="form-body">


          <form method="post" >
            <div class="form-group">

                    <?php
                    echo "<form name = 'EAV' id='comment_form' method ='post'>";
                    $Applicant->notify();
                    $Names;
                    $Types;
                    $i=-1;
                    $result = $RoleEav->View();
                    while($row =mysqli_fetch_array($result)){
                    $i++;
                    echo "<br />";

                    if(!strcmp($row["Type"],"radio")){
                        echo "<label>". $row["Name"]. " :</label><br/>";
                        echo "<input type='hidden' name='ApplicationID".$i."' value='".$row["ID"]."'>";

                        $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                        $Name =mysqli_fetch_array($NameResult);
                        $SizeResult = $RoleEav->SizeOfRadio($row['Name']);
                        echo "<input  type='".$row["Type"]."' value='".$Name['ApplicationGroupName']."' name='value".$i."'   required>".$Name['ApplicationGroupName']."<br />";
                        $Size=mysqli_num_rows($SizeResult);

                        for($x=1;$x<$Size;$x++){
                        $row = mysqli_fetch_array($result);
                        $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                        $Name =mysqli_fetch_array($NameResult);
                        echo "<input  type='".$row["Type"]."' value='".$Name['ApplicationGroupName']."' name='value".$i."'   required>".$Name['ApplicationGroupName']."<br />";}
                    }
                        elseif(!strcmp($row["Type"],"select")){
                             echo "<label>". $row["Name"]. " :</label><br/>";
                            echo "<input type='hidden' name='ApplicationID".$i."' value='".$row["ID"]."'>";
                            $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                            $Name =mysqli_fetch_array($NameResult);
                            $SizeResult = $RoleEav->SizeOfRadio($row['Name']);
                            $Size=mysqli_num_rows($SizeResult);
                            echo"<select name='value".$i."'>";
                            echo"<option value=".$Name['ApplicationGroupName'].">".$Name['ApplicationGroupName']."</option>";
                            for($x=1;$x<$Size;$x++){
                        $row = mysqli_fetch_array($result);
                        $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                        $Name =mysqli_fetch_array($NameResult);
                        echo"<option value=".$Name['ApplicationGroupName'].">".$Name['ApplicationGroupName']."</option>";
                       }

                            echo"</select>
                            <br/>";

                        }
                        else{
                    echo "<label>". $row["Name"]. "</label>";
                    echo"<input type='hidden' name='ApplicationID".$i."' value='".$row["ID"]."'>";
                    echo "<input type='".$row["Type"]."' name='value".$i."' class='form-control' placeholder='".$row["Type"]."' required>";
                    }
                    }
                    echo "<br/>
                    <input type='submit' class='btn btn-success'value='Confirm' id='post' name='post'>
                    </form>";
                    if(isset($_POST['post'])){
                    $Applicant->InsertEvent($_POST["value0"]);
                    $UID = $RoleEav->Add();
                    $j=-1;
                    while($j<$i){
                    $j++;
                    $RoleEav->AddValue($_POST['ApplicationID'.$j],$_POST['value'.$j],$UID);
                    }
                    }
            ?>


          </div>
        </form>
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




	<!-- Classie --><!-- for toggle left push menu script -->
    <script>



</script>
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

   /* function shaf3y(x) {

        //var x = document.getElementById("mySelect").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
         }
        };
        xmlhttp.open("GET", "ajax.php?q=" + x, true);
        xmlhttp.send();
    }*/
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
