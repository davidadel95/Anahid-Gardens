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
                        <h4>Events:</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Type</th>
                                    <th>Event Name</th>
                                    <th>Price</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    require_once "dbconnect.php";
                                    require_once "Model/EventModel.php";
                                    require_once "Model/CommentsModel.php";
                                    $eventModel = new EventModel();
                                    $eventTypes= $eventModel->View();
                                    $commentModel = new CommentsModel();
                                    $j = 1;
                                    for ($i=0;$i<=$eventTypes;$i++){
                                        $commentModel->viewSpecificComment($eventModel->ID[$i]);

                                        echo "<tr>";
                                        echo "<th>".$j."</th>";
                                        echo "<td>".$eventModel->EventTypeID[$i]."</td>";
                                        echo "<td>".$eventModel->Name[$i]."</td>";
                                        echo "<td>".$eventModel->Price[$i]."</td>";

                                        if (isset($commentModel->Value[$i])){
                                            echo "<td>".$commentModel->Value[$i]."</td>";
                                        }else{
                                            echo "<td></td>";
                                        }

                                        echo "</tr>";
                                        $j++;
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

    function shaf3y(x) {

        //var x = document.getElementById("mySelect").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
         }
        };
        xmlhttp.open("GET", "ajax.php?q=" + x, true);
        xmlhttp.send();
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
