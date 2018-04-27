<?php require_once "includes.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Car Data</title>
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
                      <h4>New Car Data</h4>
                    </div>

                      <div class="form-body">
                          <form method="post">
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

                              <label>Available Models </label>
                              <select name="modelID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                  <?php
                                  $carTypeModel = new CarTypeModel();
                                  $carTypes= $carTypeModel->viewCarModels();
                                  for ($i=0;$i<=$carTypes;$i++){
                                      echo "<option value='".$carTypeModel->ID[$i]."'> ".$carTypeModel->Name[$i]."</option>";
                                  }
                                  ?>
                              </select>
                              <br>

                              <label>Available Colors </label>
                              <select name="colorID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                  <?php
                                  $carYearModel = new CarColorModel();
                                  $eventTypes= $carYearModel->View();
                                  for ($i=0;$i<=$eventTypes;$i++){
                                      echo "<option value='".$carYearModel->ID[$i]."'> ".$carYearModel->Color[$i]."</option>";
                                  }
                                  ?>
                              </select>
                              <br>

                              <label>Model Year </label>
                              <select name="yearID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >
                                  <?php
                                  $carYearModel = new CarYearModel();
                                  $carYear= $carYearModel->View();
                                  for ($i=0;$i<=$carYear;$i++){
                                      echo "<option value='".$carYearModel->ID[$i]."'> ".$carYearModel->Year[$i]."</option>";
                                  }
                                  ?>
                              </select>
                              <br>
                              <label>Driver Name </label>
<!--                              <select name="driverID" id="mySelect" onchange="shaf3y(this.value)" class="form-control" >-->
                                  <?php

                                  $user = new User();
                                  $result = $user->ViewDriver();

                                  echo "<select name=\"driverID\" id=\"mySelect\" onchange=\"shaf3y(this.value)\" class=\"form-control\" >";
                                  while($row =mysqli_fetch_array($result)){


                                    echo "<option value='".$row['id']."'> ".$row['Value']."</option>";
                                  }

                                  echo "</select>";
                                  ?>
<!--                              </select>-->
                              <br>
                              <label>Plate Nb</label>
                              <br>
                              <input name="PlateNB" type="text" class="form-control" placeholder="eg: BSL287..">
                              <br>
                              <input type="submit" class="btn btn-success" value="Confirm">
                          </form>
                      </div>
                        </div>
                      <?php
                      if($_POST){
                          $carData = new CarDataModel();
                          $carData->TypeID = $_POST["modelID"];
                          $carData->ColorID = $_POST["colorID"];
                          $carData->YearID = $_POST["yearID"];
                          $carData->PlateNb = $_POST["PlateNB"];
                          $carData->Add();
                          echo "<meta http-equiv='refresh' content='0'>";
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
