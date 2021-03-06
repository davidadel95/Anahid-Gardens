
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Anahid Gardens - Salary</title>
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
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ExperienceSalariesModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalaryManipulationModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/WorkersHoursSalaryModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalariesPaymentModel.php";
    
    $userID = $_REQUEST['id'];
    $SalaryManipulationModel = new SalaryManipulationModel;
    $WorkersHoursSalaryModel = new WorkersHoursSalaryModel;
    $ExperienceSalariesModel = new ExperienceSalariesModel;
    $SalaryPayment = new SalariesPaymentModel;
    $RoleName = new RoleNameEAV;
    $User = new User;
    if($ExperienceSalariesModel->getExpVal($userID))
                {
                    $experienceValue = $ExperienceSalariesModel->getExpVal($userID);
                }
                else
                {
                    $experienceValue = 0;
                }
    $RoleID = $User->GetRoleID($userID);
                    $package = $WorkersHoursSalaryModel->getRoleIDData($RoleID);  
                    $packageSalaryPerMonth = $package->BasicHour * $package->NormalHours * 22;
                      
    
                
    

?>
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php
        include_once "Navigationbar2.php";
			?>
    </div>

		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
            <?php
            include_once "Header.php";
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
											<h4>Employee Salary Information</h4>
										</div>
						<div class="form-body">
							
								<div class="form-group">
                                    
                                    <?php
                                        if($SalaryManipulationModel->existing($userID))
                            {   
                                
                                echo "<br/>Employee Name: ".$User->getUsername($userID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                $num = 0;
                                if($SalaryManipulationModel->isBonus == 0)
                                {
                                    $totalSalary = $packageSalaryPerMonth+ $experienceValue + $num;
                                    $num = -1 * abs($SalaryManipulationModel->Value);
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                else
                                {   
                                    $totalSalary = $packageSalaryPerMonth  + $experienceValue - $num;
                                    $num = $SalaryManipulationModel->Value;
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE";
                                echo "<br/><br/> <div class='form-title'>Calculation </div> <br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >=0)
                                {
                                    echo "<br/>+<br/>".$experienceValue;
                                }
                                
                                echo " LE<br/>-<br/>".$num." LE<br/><br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                        else
                            {
                                echo "<br/>Employee Name: ".$User->getUsername($userID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE";
                                echo "<br/>Attended Salary = ".$SalaryPayment->getValue($userID)." LE";
                                echo "<br/><br/> <div class='form-title'>Calculation </div><br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >=0)
                                {
                                    echo "<br/>+<br/>".$experienceValue;
                                }
                                $totalSalary = $packageSalaryPerMonth + $experienceValue+$SalaryPayment->getValue($userID);
                                echo " LE<br/>+<br/>".$SalaryPayment->getValue($userID)."<br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                                    ?>
                                    
                                </div>
                                    </div>
                            
															
															
              </form>
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