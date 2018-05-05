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
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EventModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/POptionsModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/PaymentEAVModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/OptionsTypeModel.php";

    $EventModel = new EventModel;
    $User = new User;
    $OptionsTypeModel = new OptionsTypeModel;
    $PaymentEAVModel = new PaymentEAVModel;
    $POptionsModel = new POptionsModel;
    list($POptionArr,$OptionNames) = $POptionsModel->View();
    $OptionsTypeModel = new OptionsTypeModel;
    if (isset($_POST["PaymentMade"])) {
        $MethodID = $PaymentEAVModel->GetID($_POST['TypeSelected'])[0];
        $Options = $POptionsModel->GetOptionsNames($MethodID);
        $TransactionModel = new TransactionModel;
        $TransactionModel->UserID = $User->GetIDByMail($_POST['UserEmail']);
        $TransactionModel->EventID = $EventModel->getEventID($_POST['EventName']);
        $TransactionModel->Quantity = $_POST['Quantity'];
        $TransactionModel->Add();
        $PaymentOptionsModel = new PaymentOptionsModel;
        for($i = 0 ; $i<sizeof($Options) ; $i++)
        {
            $PaymentOptionVal = new PaymentOptionVal($PaymentOptionsModel->GetID($MethodID,$POptionsModel->GetID($Options[$i])[0])[0]
                                                                            ,$_POST[$Options[$i]]
                                                                            ,$TransactionModel->getLastTransaction()[0]);
            $PaymentOptionVal->Add();
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
											<h4>Transaction Details</h4>
										</div>
						<div class="form-body">
							
								<div class="form-group">
										
                                    <label>Event Type</label>
                                        <select name="EventType" id="EventType" class="form-control" onchange="loadEventNames(this.value)">
                                        <option value="SelectEventType">-Select Event Type-</option>
										<?php
                                            
										for ($x=0; $x<sizeof($EventModel->ShowEvents());$x++)
										{
											echo "<option value=".$EventModel->ShowEvents()[$x]."> ".$EventModel->ShowEvents()[$x]."</option>";

										}
										?>
                                    </select>
                                    <br/>
                                        
                                    <div id="EventNames">
                                        
                                    </div>
                                    <label>Quantity</label>
                                    <input name="Quantity" id="Quantity" min="1" type="number" class="form-control" placeholder="eg: 3" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/^0/, '');" onchange="showPrice2(this.value)" required>
                                    <br/>
                                    <div id="priceDiv">

                                    </div>
                                    
                            </div>
                  </div>
                                    <div class="form-title">
											<h4>Account Details</h4>
										</div>
						<div class="form-body">
							
								<div class="form-group">
                                    <label>User E-Mail Address</label>
										<input name="UserEmail" type="text" list="emailResults" class="form-control" placeholder="eg: johndoe@example.com" onkeyup="checkEmail(this.value)" required>
                                        <datalist id="emailResults">
                                        </datalist>
										<br>
                                        <label>Payment Type</label>
                                        <select name="TypeSelected" id="TypeSelected"  class="form-control" onchange="loadFields(this.value)">
                                            <option value="SelectPaymentType">-Select Payment Type-</option>
										<?php
                                            
										for ($x=0; $x<sizeof($PaymentEAVModel->View());$x++)
										{
											echo "<option value=".$PaymentEAVModel->View()[$x]."> ".$PaymentEAVModel->View()[$x]."</option>";
										}
										?>

									</select>
                                    <br/>
                                        <div class="form-group" id="Options">
                                                
                                        </div>
                                    <br/>
										<input type="submit" onclick="return emptyChecker()" class="btn btn-success" name="PaymentMade" Value="Confirm">
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