
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
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EventModel.php";
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
                <script  src="../js/index1.js"></script>
                <div class="forms">
                  <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                    <div class="form-title">
                      <h4>Add Comment</h4>
                    </div>
                    <div class="form-body">
                        <label>Available Events </label>
                        <form method="post">
                            <select name="eventID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                <?php
                                    $eventModel = new EventModel();
                                    $eventTypes= $eventModel->View();
                                    for ($i=0;$i<=$eventTypes;$i++){
                                        echo "<option value='".$eventModel->ID[$i]."'> ".$eventModel->Name[$i]."</option>";
                                        }
                                        ?>
                            </select>
                        <br>
                        <div class="form-group">

                                <label>Event Name</label>
                                <br>
                                <input name="commentValue" type="text" class="form-control" placeholder="eg: Comment..">
                                <br>
                                <input type="submit" class="btn btn-success" value="Confirm">
                            </form>
                        </div>
                        </div>
                      <?php
                      if($_POST){
//                          print_r($_POST);
                          $comment = new CommentsModel();
                          $comment->Value = $_POST["commentValue"];
                          $comment->EventDetailsID = $_POST["eventID"];
                          $comment->Add();
                      }
                      ?>
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
