<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
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
   <!-- Metis Menu -->
   <script src="../js/metisMenu.min.js"></script>
   <script src="../js/custom.js"></script>
   <link href="../css/custom.css" rel="stylesheet">
   <!--//Metis Menu -->

  </head>
  <body>

      <!--left-fixed -navigation-->
      <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <!-- navigation title -->
              <h1><a class="navbar-brand" href="Dashboard.php"><span class="fa fa-area-chart"></span> Anahid<span class="dashboard_text">Gardens Nursery</span></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                  <a href="Dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                  </a>
                </li>

                <li class="treeview">
                    <a href="TeacherSchedule.php">
                        <i class="fa fa-dashboard"></i>
                        <span>View Schedule</span>
                    </a>
                </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
      </aside>
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

        <!-- toggle of tree view in side bar, 3ashan lama badoos 3ala el items bet-expand -->
        <!-- side nav js -->
      	<script src='../js/SidebarNav.min.js' type='text/javascript'></script>
      	<script>
            $('.sidebar-menu').SidebarNav()
          </script>
      	<!-- //side nav js -->
  </body>
</html>
