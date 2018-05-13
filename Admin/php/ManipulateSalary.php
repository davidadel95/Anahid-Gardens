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
<title>Make a Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->

<!-- //chart -->

<!-- Metis Menu -->
<script src="../js/metisMenu.min.js"></script>
<script src="../js/custom.js"></script>
<script  src="../js/index1.js"></script>
<!-- <link href="../css/custom.css" rel="stylesheet"> -->
<!--//Metis Menu -->
<style>

</style>



</head>
<body class="cbp-spmenu-push">
    <?php
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/WorkersHoursSalaryModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ExperienceSalariesModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalaryManipulationModel.php";

    
    $User = new User;
    $WorkersHoursSalary = new WorkersHoursSalaryModel;
    $ExperienceSalaries = new ExperienceSalariesModel;
    $SalaryManipulationModel = new SalaryManipulationModel;
    
    if (isset($_POST["apply"])) { 
        if($_POST['salarySelect'] != "-Select Option-")
        {
            if($User->checkUser($_POST['UserID']))
            {
                if($_POST["salarySelect"] == "(Add/Change) Experience Salary")
                {
                    if($ExperienceSalaries->existing($_POST["UserID"]))
                    {
                        $ExperienceSalaries->UserID = $_POST["UserID"];
                        $ExperienceSalaries->Value = $_POST["methodVal"];
                        $ExperienceSalaries->Edit();
                    }
                    else
                    {
                        $ExperienceSalaries->UserID = $_POST["UserID"];
                        $ExperienceSalaries->Value = $_POST["methodVal"];
                        $ExperienceSalaries->Add();
                    }
                }
                if($_POST["salarySelect"] == "Increase Salary (/Month)")
                {
                    if($SalaryManipulationModel->existing($_POST["UserID"]))
                    {
                        $SalaryManipulationModel->Value = $_POST["methodVal"];
                        $SalaryManipulationModel->isBonus = 1;
                        $SalaryManipulationModel->Edit();
                    }
                    else
                    {
                        $SalaryManipulationModel->UserID = $_POST["UserID"];
                        $SalaryManipulationModel->Value = $_POST["methodVal"];
                        $SalaryManipulationModel->isBonus = 1;
                        $SalaryManipulationModel->Add();
                    }
                }
                if($_POST["salarySelect"] == "Decrease Salary (/Month)")
                {
                    if($SalaryManipulationModel->existing($_POST["UserID"]))
                    {
                        $SalaryManipulationModel->Value = $_POST["methodVal"];
                        $SalaryManipulationModel->isBonus = 0;
                        $SalaryManipulationModel->Edit();
                    }
                    else
                    {
                        $SalaryManipulationModel->UserID = $_POST["UserID"];
                        $SalaryManipulationModel->Value = $_POST["methodVal"];
                        $SalaryManipulationModel->isBonus = 0;
                        $SalaryManipulationModel->Add();
                    }
                }
            }else{
                echo '<script>alert("Non-Existing Employee ID!")</script>';
             }
        }
        else
            echo '<script>alert("Please Select a Method!")</script>';
        
        
    }
        

?>
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php
        include "Navigationbar2.php";
			?>
    </div>

		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
             <?php
            include "Header.php";
			?>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
    <div id="page-wrapper">
			<div class="main-page">
        <div class="forms">
          <div class="form-grids row widget-shadow" data-example-id="basic-forms">
              <form method="post" >
						<div class="form-title">
											<h4>Manipulate Employee Salary</h4>
										</div>
						<div class="form-body">
							    <label>Method</label>
                                <br/>
								<select name="salarySelect" id="selected" onchange="getDetails2(this.value)"  class="form-control" >
                                    <option>-Select Option-</option>
                                    <option>Increase Salary (/Month)</option>
                                    <option>Decrease Salary (/Month)</option>
                                    <option>(Add/Change) Experience Salary</option>
                                </select>
                                <br/>
                                <label>Value (L.E)</label>
                                <br/>
                                <input name="methodVal" id="methodVal" type="number" onchange="getDetails3(this.value)" class="form-control" placeholder="eg: 2000" required>
                                <br/>
                                <label>Employee ID</label>
                                <br/>
                                <input name="UserID" id="userID" min="1" type="number" class="form-control" placeholder="eg: 3" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/^0/, '');" onchange="getDetails(this.value)" required>
                                
                                <br/>
                                <div id="employeeDetails">
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-success" name="apply" value="Apply">
						</div>
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
    <script type="text/javascript" src="../js/MakePaymentJs.js"></script>
</body>
</html>