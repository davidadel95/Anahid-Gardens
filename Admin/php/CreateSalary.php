
<!DOCTYPE HTML>
<html>
<head>
<title>Anahid Gardens - Create Salary Package</title>
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

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/WorkersHoursSalaryModel.php";

    
    $Role = new RoleNameEAV;
    $WorkersHours = new WorkersHoursSalaryModel;
    
    
    if (isset($_POST["addSalary"])) {
        
        if($_POST['roles'] == "-Select A Role-")
        {
            echo "<script type='text/javascript'>alert('Please Select a Role');</script>";
        }
        else{
            $WorkersHours->BasicHour = $_POST['BHr'];
            $WorkersHours->ExtraHour = $_POST['EHr'];
            $WorkersHours->DeductionHour = $_POST['DHr'];
            $WorkersHours->RoleID = $_POST['roles'];
            $WorkersHours->NormalHours = $_POST['NWH'];
            $WorkersHours->Add();
        }
        
    }
        

?>
	<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <?php
        include("NavigationBar2.php");
			?>
    </div>

		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
             <?php
        include("Header.php");
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
											<h4>Package Information</h4>
										</div>
						<div class="form-body">
							
								<div class="form-group">
										
                                    <label>Basic Hour Price (L.E)</label>
                                    <br/>
                                    <input name="BHr" type="number" class="form-control" placeholder="eg: 1200" required>
                                    
                                    <br/>
                                    <label>Extra Hour Price (L.E)</label>
                                    <br/>
                                    <input name="EHr" type="number" class="form-control" placeholder="eg: 20" required>
                                    
                                    <br/>
                                    <label>Deduction Hour Price (L.E)</label>
                                    <br/>
                                    <input name="DHr" type="number" class="form-control" placeholder="eg: 20" required>
                                    
                                    <br/>
                                    <label>Role</label>
                                    <br/>
                                    <select name="roles" class="form-control" >
                                        <option value="-Select A Role-">-Select A Role-</option>
                                        <?php
                                        
                                            $roleTypes= $Role->View();
                                            for ($i=0;$i<=$roleTypes;$i++)
                                            {
                                                if($WorkersHours->checkExistingRole($Role->ID[$i]))
                                                {
                                                    echo "<option value='".$Role->ID[$i]."' > ".$Role->Names[$i]." </option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    
                                    <br/>
                                    <label>Working Hours Per Day</label>
                                    <br/>
                                    <input name="NWH" type="number" class="form-control" placeholder="eg: 1200" required>
                                    
                                    <br/>
                                        
                                    <input type="submit" class="btn btn-success" name="addSalary" Value="Add Package">
                                    
                                    
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