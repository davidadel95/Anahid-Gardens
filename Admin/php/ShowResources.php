
<!DOCTYPE HTML>
<html>
<head>
    <title>Resources</title>
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
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ResourceModel.php";
    ?>
    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            <script  src="../js/index1.js"></script>
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                    <div class="form-title">
                        <h4>Resources Details</h4>
                    </div>

                    <div class="form-body">

                            <label>Available Resources </label>
                            <select name="carTypeID" id="carTypeID" onchange="David(this.value)" class="form-control" >
                                <?php
                                    $resourceModel = new ResourceModel();
                                    $parents= $resourceModel->View();
                                    for ($i=0; $i<=$parents; $i++){
                                    echo "<option value='".$resourceModel->ID[$i]."'> ".$resourceModel->Name[$i]."</option>";
                                }
                                ?>
                            </select>
                            <br>
                            <div id="ajax">
                              <?php
                              echo "<label>Available Resources </label>";
                              $resource = new ResourceModel();
                              $numberOfResources = $resource->viewSpecificResource($resourceModel->ID[0]);


                              if ($numberOfResources < 0){
                                  echo "</br>";
                                  echo "<label style='color: red'><strong>No available model, please add one first</strong></label>";
                              }else{
                                      echo "<table class='table table-hover'>
                                              <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Model Name</th>
                                                    <th>Quantity</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                              ";

                                              $j = 1;
                                              for ($i=0;$i<=$numberOfResources;$i++){
                                                  echo "<tr>";
                                                  echo "<th>".$j."</th>";
                                                  echo "<td>".$resource->Name[$i]."</td>";
                                                  echo "<td>".$resource->Quantity[$i]."</td>";
                                                  echo "</tr>";
                                                  $j++;
                                                  }

                                      echo "</tbody>
                                              </table>";
                                              $quantity = new ResourceModel();
                                              $number = $quantity->getQuantity($resourceModel->ID[0]);
                                              for ($i=0;$i<=$number;$i++){
                                                  $resourceQuantity = $quantity->Quantity[$i];
                                              }

                                  echo "<h4>Total number: $resourceQuantity</h4>";
                              }
                              echo "<br>";
                               ?>
                            </div>

                    </div>
                </div>

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
    function David(x) {

        var carTypeID = document.getElementById("carTypeID").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "AjaxViewResources.php?typeID=" + x, true);
        xmlhttp.send();
    }



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

</body>
</html>
