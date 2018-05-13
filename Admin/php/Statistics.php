<!DOCTYPE HTML>
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Classes.php";
$User = new User;
$Classes = new Classes;
?>
<html>
<head>
<title>Show Statistics</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="../css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='../css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->

 <!-- js-->
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->

<!-- chart -->
<script src="../js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="../js/metisMenu.min.js"></script>
<script src="../js/custom.js"></script>
<link href="../css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
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


    <script  src="js/index1.js"></script>
    <div class="forms">
      <div class="form-grids row widget-shadow" data-example-id="basic-forms">
          
          
          
          
          <div class="form-title"><h4>Statistics</h4></div>
          <div id="myfirstchart" style="height: 250px;"></div>        
           

					
			</div>
		</div>
<div class="forms">
<div class="form-grids row widget-shadow" data-example-id="basic-forms">
<div class="form-title"><h4>Statistics 2</h4></div>

	<p>This Donut shows the quantity of users in each Role </p>		
    <div id="donut-example" style="height: 250px;"></div>
    
    </div>
    </div>
<div class="forms">
<div class="form-grids row widget-shadow" data-example-id="basic-forms">
<div class="form-title"><h4>Statistics 3</h4></div>

	<p>This Bar shows the number of students in each class</p>		
    <div id="bar-example" style="height: 250px;"></div>
    
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
    <script>

new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'bar-example',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
      <?php
      $counter= $Classes->CountUsersInClass();
      for($x=0;$x<=$counter;$x++){
          $ClassNames[$x]=$Classes->getClassName($Classes->ClassID[$x]);
          echo "{y: '".$ClassNames[$x]."', a:".$Classes->Count[$x]."},";
          
      }
      ?>
      

  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'y',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['a'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
        Morris.Donut({
  element: 'donut-example',
  data: [
      <?php
      $counter = $User->CountRoles();
      for($i=0;$i<=$counter;$i++){
        echo "{label:'". $User->RoleName[$i] ."', value:". $User->CountOFUserRole($User->RoleID[$i]) ."},";  
      }
      ?>
   
  ]
});
    
        Morris.Line({
  element: 'myfirstchart',
  data: [
    { year: '2006', value: 100},
    { year: '2007', value: 75},
    { year: '2008', value: 50 },
    { year: '2009', value: 75 },
    { year: '2010', value: 50 },
    { year: '2011', value: 75 },
    { year: '2012', value: 100}
  ],
  xkey: 'year',
  ykeys: ['value'],
  labels: [ 'value']
});

</script>
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

   /* function shaf3y(x) {

        //var x = document.getElementById("mySelect").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax").innerHTML = this.responseText;
         }
        };
        xmlhttp.open("GET", "ajax.php?q=" + x, true);
        xmlhttp.send();
    }*/
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
