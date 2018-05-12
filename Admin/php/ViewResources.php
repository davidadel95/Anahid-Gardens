
<!DOCTYPE HTML>
<html>
<head>
<title>View Resources</title>
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
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CarTypeModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ResourceModel.php";
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
                      <h4>New Resource Type</h4>
                    </div>
                    <div class="form-body">
                        <label>Available Resources </label>
                            <select name="carTypeID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                <?php
                                    $resourceModel = new ResourceModel();
                                    $parents= $resourceModel->View();
                                    for ($i=0; $i<=$parents; $i++){
                                        echo "<option value='".$resourceModel->ID[$i]."'> ".$resourceModel->Name[$i]."</option>";
                                        }
                                        ?>
                            </select>
                        <br>
                        <div class="form-group">
                            <form method="post" name="">
                                <input type="hidden" name="form" value="typeForm">
                                <label>New Resource Name</label>
                                <br>
                                <input name="resourceName" type="text" class="form-control" placeholder="eg: Resource">
                                <br>
                                <input type="submit" class="btn btn-success" value="Confirm">
                            </form>
                        </div>
                        </div>

                  </div>
                </div>

                <div class="forms">
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                        <div class="form-title">
                            <h4>New Resource</h4>
                        </div>
                        <div class="form-body">
                            <label>Please select resource type </label>
                            <form method="post" name="modelForm">
                                <select name="parentID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                    <?php
                                    $resourceModel = new ResourceModel();
                                    $parents= $resourceModel->View();
                                    for ($i=0; $i<=$parents; $i++){
                                        echo "<option value='".$resourceModel->ID[$i]."'> ".$resourceModel->Name[$i]."</option>";
                                    }
                                    ?>
                                </select>
                            </select>
                            <br>
                            <div class="form-group">
                                    <input type="hidden" name="form" value="modelForm">
                                    <label>New Resource Name</label>
                                    <br>
                                    <input name="model" type="text" class="form-control" placeholder="eg: Deskjet..">
                                    <br>
                                    <label>Quantity</label>
                                    <br>
                                    <input name="quantity" type="text" class="form-control" placeholder="5">
                                    <br>
                                    <input type="submit" class="btn btn-success" value="Confirm">
                                </form>
                            </div>
                        </div>
                        <?php
                        if(isset($_POST['form'])){
                            switch ($_POST['form']) {
                                case "typeForm":
//                                    echo "submitted A";
                                    $resourceName=$_POST["resourceName"];
                                    $resourceParent = new ResourceModel();
                                    $resourceParent->Name = $resourceName;
                                    $resourceParent->ParentID = 1;
                                    $resourceParent->Add();
                                    echo "<meta http-equiv='refresh' content='0'>";
                                    break;

                                case "modelForm":
//                                    echo "submitted B";

                                    $addResource = new ResourceModel();
                                    $addResource->Name = $_POST["model"];
                                    $addResource->Quantity = $_POST["quantity"];
                                    $addResource->ParentID = $_POST["parentID"];
                                    $addResource->addChildResource($_POST['parentID']);

                                    echo "<meta http-equiv='refresh' content='0'>";
                                    break;

                                default:
                                    echo "Invalid input";
                            }
                        }
                        ?>
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
