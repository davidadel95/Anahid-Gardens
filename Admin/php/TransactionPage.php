<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Anahid Gardens - Transaction</title>
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
    require_once "includes.php";
    $EventModel = new EventModel;
    $transactionID =  $_COOKIE['cookieView'];
    $TransactionModel = new TransactionModel;
    $User = new User;
    $TransactionID = 
    $OptionsTypeModel = new OptionsTypeModel;
    $PaymentEAVModel = new PaymentEAVModel;
    $POptionsModel = new POptionsModel;
    list($POptionArr,$OptionNames) = $POptionsModel->View();
    $OptionsTypeModel = new OptionsTypeModel;
        

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
            <?php include("Header.php"); ?>
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
								    <div id="print_me">
                                    <label style="font-size:20px">Transaction ID:</label>
                                    <label style="font-size:20px"><?php echo $TransactionModel->getTransaction($transactionID)[0]; ?></label>
                                    <br/><br/>
                                    <label style="font-size:20px">Username:</label>
                                    <label style="font-size:20px"><?php echo $TransactionModel->getTransaction($transactionID)[1]; ?></label>
                                    <br/><br/>
                                    <label style="font-size:20px">Event Name:</label>
                                    <label style="font-size:20px"><?php echo $TransactionModel->getTransaction($transactionID)[2]; ?></label>
                                    <br/>
                                    <br/>
                                    <label style="font-size:20px">Date:</label>
                                    <label style="font-size:20px"><?php echo $TransactionModel->getTransaction($transactionID)[3]; ?></label>
                                    <br/>
                                    <br/>
                                    <label style="font-size:20px">Quantity:</label>
                                    <label style="font-size:20px"><?php echo $TransactionModel->getTransaction($transactionID)[4]; ?></label>
                                    <br/>
                                    <br>
                                    
                                    </div>
                                    <button class="btn btn-success" name="Print" id="print_one">Print</button>
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


    <script src="../js/jsPDF-master/jspdf.js"></script>
    <script src="../js/jsPDF-master/plugins/from_html.js"></script>
    <script src="../js/jsPDF-master/plugins/split_text_to_size.js"></script>
    <script src="../js/jsPDF-master/plugins/standard_fonts_metrics.js"></script>
	<!-- Classie --><!-- for toggle left push menu script -->
            <script src="../js/classie.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
        $("#print_one").live("click", function () {
            var divContents = $("#print_me").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Transaction Details</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
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