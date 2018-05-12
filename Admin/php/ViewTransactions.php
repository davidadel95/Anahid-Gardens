
<!DOCTYPE HTML>
<html>
<head>
<title>Anahid Gardens - Transactions</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<style>

</style>


</head>
<body class="cbp-spmenu-push">
    <?php
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EventModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/TransactionModel.php";
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
                <div class="tables">
                    <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
                        <h4>Transactions:</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User ID</th>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    
                                    $EventModel = new EventModel;
                                    $TransactionModel = new TransactionModel();
                                    $TransactionModel->View();
                                    for ($i=0;$i<sizeof($TransactionModel->ID);$i++){
                                        echo "<tr>";
                                        echo '<th><a href="TransactionPage.php" onclick="view('.$TransactionModel->ID[$i].')">'.$TransactionModel->ID[$i].'</a></th>';
                                        echo "<td>".$TransactionModel->UserID[$i]."</td>";
                                        echo "<td>".$EventModel->getEventName($TransactionModel->EventID[$i])."</td>";
                                        echo "<td>".$TransactionModel->Date[$i]."</td>";
                                        echo "<td>".$TransactionModel->Amount[$i]."</td>";
                                        echo "<td>".$EventModel->getEventPrice($EventModel->getEventName($TransactionModel->EventID[$i]))*$TransactionModel->Amount[$i]."</td>";
                                        echo '<td><a href="invoicePDF.php" target="_blank" onclick="view('.$TransactionModel->ID[$i].')" class="btn btn-success">Print</a>';
                                        echo "</tr>";
                                        
                                    }
                                    ?>
                            </tbody>
                        </table>
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
            function view(ID)
            {
                document.cookie = "cookieView=" + ID;
            }
            
</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->

	<!--scrolling js-->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!--//scrolling js-->
    <script src="../js/xepOnline.jqPlugin.js"></script>
	<!-- Bootstrap Core JavaScript -->
   <!-- <script src="js/bootstrap.js"> </script> -->
	<!-- //Bootstrap Core JavaScript -->

</body>
</html>
