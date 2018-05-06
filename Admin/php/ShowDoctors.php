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
<?php
session_start();
    ?>
<html>
<head>
<title>Dashboard</title>
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
<!--//Metis Menu -->
<style>

</style>


</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php include("Navigationbar2.php"); ?>
    </div>

        <?php
        $rootPath = $_SERVER['DOCUMENT_ROOT'];

        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
        require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";

        ?>
		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
				<?php include("Header.php"); ?>
		</div>

		<div id="page-wrapper">
			<div class="main-page">
        <div class="tables">
          <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>Users:</h4>
              <input type="text" class="form-control" style="height: 30px;width: 100px;margin-left:900px;" placeholder="Search..."
                     id="SearchBar" onkeyup="Search()">
              <form>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Role</th>
                  <th>Date Added</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
              </thead>
                <tbody id="SearchAjax">


                  <?php
                    echo "<div>";
                    $User = new User;
                    $result = $User->View();
                    $i=-1;
                    while($row =mysqli_fetch_array($result)){
                    $i++;
                    $i++;
                    echo "<tr>
                    <th scope='row'>".$i."</th>";
                    $i--;
                    echo "<td>".$row['Value']."</td>
                    <td>".$row['Name']."</td>
                    <td>".$row['DateAdded']."</td>";
                    if(strcmp($row['Status'],"Missing Login")== 0)
                        echo "<td><button class='btn btn-dark' type='button' onclick='shaf3y(".$row['id'].")' name='Formbtn'>".$row['Status'].
                        "</button>";
                        else echo "<td>".$row['Status']."</td>";
                    echo "<td><button class='btn btn-success' type='button' onclick='shaf3y2(".$row['id'].")' name='Formbtn'>Edit User</button>";

                    }
                    echo "</div>";
                  ?>

                    </tbody>
            </table>
                  </form>
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
            function shaf3y(x) {

        //var x = document.getElementById("mySelect").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("ajax").innerHTML = this.responseText;
                    document.location.href = 'CompleteUser.php';
         }
        };
        xmlhttp.open("GET", "CompleteUserAjax.php?q=" + x, true);
        xmlhttp.send();}
               function shaf3y2(x) {

        //var x = document.getElementById("mySelect").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("ajax").innerHTML = this.responseText;
                    document.location.href = 'EditUser.php';
         }
        };
        xmlhttp.open("GET", "CompleteUserAjax.php?q=" + x, true);
        xmlhttp.send();}
            function Search() {

        var x = document.getElementById("SearchBar").value;
        var n = x.includes("\'");
        if(!n){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("SearchAjax").innerHTML = this.responseText;

         }
        };
        xmlhttp.open("GET", "ShowUserAjax.php?q=" + x, true);
        xmlhttp.send();}}
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
