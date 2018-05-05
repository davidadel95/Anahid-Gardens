<!DOCTYPE HTML>
<html>
<head>
<title>Show Car Types</title>
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
		<?php
		require_once "includes.php";
		 ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
                <script  src="../js/index1.js"></script>
                <div class="forms">
                  <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                    <div class="form-title">
                      <h4>New Car Type</h4>
                    </div>
                    <div class="form-body">
                        <label>Available Car Types </label>
                            <select name="carTypeID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                <?php
                                    $carTypeModel = new CarTypeModel();
                                    $carTypes= $carTypeModel->View();
                                    for ($i=0; $i<=$carTypes; $i++){
                                        echo "<option value='".$carTypeModel->ID[$i]."'> ".$carTypeModel->Name[$i]."</option>";
                                        }
                                        ?>
                            </select>
                        <br>
                        <div class="form-group">
                            <form method="post" name="">
                                <input type="hidden" name="form" value="typeForm">
                                <label>New Car Type</label>
                                <br>
                                <input name="carType" type="text" class="form-control" placeholder="eg: Suzuki..">
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
                            <h4>New Model</h4>
                        </div>
                        <div class="form-body">
                            <label>Please select car type </label>
                            <form method="post" name="modelForm">
                            <select name="typeID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                <?php
                                $carTypeModel = new CarTypeModel();
                                $carTypes= $carTypeModel->View();
                                for ($i=0; $i<=$carTypes; $i++){
                                    echo "<option value='".$carTypeModel->ID[$i]."'> ".$carTypeModel->Name[$i]."</option>";
                                }
                                ?>
                            </select>
                            <br>
                            <div class="form-group">
                                    <input type="hidden" name="form" value="modelForm">
                                    <label>New Model Name</label>
                                    <br>
                                    <input name="model" type="text" class="form-control" placeholder="eg: Carens..">
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
                                    $carTypeName=$_POST["carType"];
                                    $car = new CarTypeModel();
                                    $car->Name = $carTypeName;
                                    $car->Add();
                                    echo "<meta http-equiv='refresh' content='0'>";
                                    break;

                                case "modelForm":
//                                    echo "submitted B";
                                    $car = new CarTypeModel();
                                    $car->Name = $_POST["model"];
                                    $car->CarTypeID = $_POST["typeID"];
                                    $car->addCarModel();
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
