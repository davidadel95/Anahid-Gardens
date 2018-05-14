
<!DOCTYPE HTML>
<html>
<head>
<title>Show Applications</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<style>

</style>


</head>
<body class="cbp-spmenu-push">
    <?php
    ?>
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php include("Navigationbar2.php"); ?>
    </div>

		<!--left-fixed -navigation-->
        <?php
                $rootPath = $_SERVER['DOCUMENT_ROOT'];
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ExperienceSalariesModel.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalaryManipulationModel.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/WorkersHoursSalaryModel.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/UserStatusModel.php";

                $SalaryManipulationModel = new SalaryManipulationModel;
                $WorkersHoursSalaryModel = new WorkersHoursSalaryModel;
                $ExperienceSalariesModel = new ExperienceSalariesModel;
                $UserStatusModel = new UserStatusModel;
                $RoleName = new RoleNameEAV;
                $User = new User;
        ?>
		<!-- header-starts -->
		<div class="sticky-header header-section ">
				<?php include("Header.php"); ?>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
                <div class="tables">
                    <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
                        <h4>Employees Salaries</h4>
                        <h5>Search By Name</h5>
                        <input type="text" onkeyup="getName(this.value)"/>
                        
                        
                            <div id="search"> 
                                <?php
                                    $employees = $User->getEmployees();
                                    echo '<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>Employee Role</th>
                                                <th>Status</th  >
                                                <th>Total Salary (/Month)</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                    for($i= 0 ; $i<sizeof($employees->RoleID);$i++)
                                    {   
                                        $totalSalary = 0;
                                        if($WorkersHoursSalaryModel->checkExistingRole($employees->RoleID[$i]))
                                        {
                                            
                                            $package = $WorkersHoursSalaryModel->getRoleIDData($employees->RoleID[$i]); 
                                            $packageSalaryPerMonth = $package->BasicHour * $package->NormalHours * 22;
                                            if($ExperienceSalariesModel->getExpVal($employees->ID[$i]))
                                            {
                                                $experienceValue = $ExperienceSalariesModel->getExpVal($employees->ID[$i]);
                                            }
                                            else
                                            {
                                                $experienceValue = 0;
                                            }
                                            if($SalaryManipulationModel->existing($employees->ID[$i]))
                                            {
                                                $num = 0;
                                                if($SalaryManipulationModel->isBonus == 0)
                                                {
                                                    $totalSalary = $packageSalaryPerMonth + $experienceValue + $num;
                                                    $num = -1 * abs($SalaryManipulationModel->Value);
                                                }
                                                else
                                                {   
                                                    $totalSalary = $packageSalaryPerMonth + $experienceValue - $num;
                                                    $num = $SalaryManipulationModel->Value;
                                                } 
                                            }
                                            else
                                            {
                                                $totalSalary = $packageSalaryPerMonth + $experienceValue;
                                            }
                                        }else
                                            $totalSalary = 0;
                                        
                                        
                                         
                                        
                                        echo "<tr>";
                                        echo "<th><a href='EmployeeSalary.php' onclick='view(".$employees->ID[$i].")'>".$employees->ID[$i]."</a></th>";
                                        echo "<td>".$employees->getUsername($employees->ID[$i])."</td>";
                                        echo "<td>".$RoleName->GetRoleName($employees->RoleID[$i])."</td>";
                                        echo "<td>".$UserStatusModel->getStatusName($employees->Status[$i])."</td>";
                                        echo "<td>".$totalSalary." LE</td>";
                                        echo "</tr>";
                                        
                                    }
                                        echo "</tbody>";
                                        echo "</table>";
                                    ?>
                                
                            </div>
                    </div>
                </div>
                <script  src="../js/index1.js"></script>

                                <!--//sreen-gallery-cursual---->
                </div>
		    </div>
        </div>
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
            function getName(x) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("search").innerHTML = this.responseText;
                 }
                };
                xhttp.open("GET", "ajaxGetByRole.php?q=" + x, true);
                xhttp.send();
            }
            function view(userID)
            {
                document.cookie = "cookieUserID=" + ID;
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
