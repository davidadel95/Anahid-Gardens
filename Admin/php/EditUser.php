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
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EventModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleEAV.php";

$UserID = $_SESSION['CompleteID'];
$User = new User;
$Roles = new RoleNameEAV;
$Role = new RoleEAV;

if(isset($_POST['Valuebtn'])){
    if($_POST['Value']){
$Role->EditRecord($_POST['Value'],$_POST['ApplicationID'],$UserID);
header ('Location: EditUser.php');                        
}}
/*if(isset($_POST['Rolebtn'])){
$User->ChangeRole($_POST['RoleID'],$UserID);
header ('Location: EditUser.php');                        
}*/
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
          <h4>Edit User
        </h4>

        </div>
        <div class="form-body">


          <form method="post" >
            <div class="form-group">

                    <?php
                    
                    $Names;
                    
                    $i=-1;
                    
                    $result = $User->viewAnotherUserInfo($UserID);
                    
                    while($row =mysqli_fetch_array($result)){
                    $i++;
                    
                    $Names[$i]=$row["name"];
                    echo "<form name = 'EAV' method ='post'>";
                    echo "<label>". $Names[$i]. "</label>";
                    echo "<br />";
                    echo"<input type='hidden' name='ApplicationID' value='".$row["ApplicationID"]."'>";
                    if(strcmp($Names[$i],'password')){
                    echo "<input style='display: inline;width: 200px;' type='text' name='Value' class='form-control' value=".$row['Value']." required>";}
                        else{
                          echo  "<input style='display: inline;width: 200px;' type='text' name='Value' class='form-control' placeholder='Enter new password' required>";
                        }
                        echo "
                    <input style='display: inline;' type='submit' class='btn btn-success'value='Edit' name='Valuebtn'>
                    </form>";
                    }
                   /* $UserRoleID = $User->GetRoleID($UserID);
                    $RoleName = $Roles->GetRoleName($UserRoleID);
                    
                    echo"<select style='width: 200px;' name='RoleID'>
                        <option value='".$UserRoleID."'>".$RoleName."</option>";
                            $result= $Roles->ViewMinusRole($RoleName);
                
                     while($row =mysqli_fetch_array($result))
                         echo "<option value='".$row['ID']."'>".$row['Name']."</option>";
                
                    echo"</select>
                        <input style='display: inline;' type='submit' class='btn btn-success'value='Edit' name='Rolebtn'>
                        </form>";*/
                
 
                    
                    
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
