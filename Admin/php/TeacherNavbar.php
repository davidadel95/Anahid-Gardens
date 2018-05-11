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


                <!-- User -->
                <li class="treeview">
                  <a href="#">
                  <i class="fa fa-user-md"></i>
                  <span>Users</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Manipulate Users</a>
                        <ul class="treeview-menu">
                            <li><a href="AddUserRole.php"><i class="fa fa-angle-right"></i>Add User</a></li>
                            <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Edit User</a></li>
                            <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Delete User</a></li>
                            <li><a href="ShowDoctors.php"><i class="fa fa-angle-right"></i>View Users</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="fa fa-angle-right"></i>User Roles</a><ul class="treeview-menu">
                        <li><a href="AddUserRole.php"><i class="fa fa-angle-right"></i>Add Role</a></li>
                        <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Edit Role</a></li>
                        <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Delete Role</a></li>
                        <li><a href="ShowDoctors.php"><i class="fa fa-angle-right"></i>View Roles</a></li>
                    </ul></li>

                    <li><a href=""><i class="fa fa-angle-right"></i>User Options</a><ul class="treeview-menu">
                        <li><a href="AddUserOption.php"><i class="fa fa-angle-right"></i>Add Option</a></li>
                        <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Edit Option</a></li>
                        <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Delete Option</a></li>
                        <li><a href="ShowDoctors.php"><i class="fa fa-angle-right"></i>View Options</a></li>
                  </ul>
                        </li>
                  </ul>
                </li>
                <!-- kids checklist menu -->
                <li class="treeview">
                  <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Kids Checklist</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-angle-right"></i>Academic</a>
                      <ul class="treeview-menu">
                        <li><a href=""><i class="fa fa-angle-right"></i>French</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>English</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Arabic</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Quraan</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Arts</a>
                            <ul class="treeview-menu">
                                <li><a href="ArtsCheck.php"><i class="fa fa-angle-right"></i>Arts Table</a></li>
                                <li><a href="AddArt.php"><i class="fa fa-angle-right"></i>Add New Art</a></li>
                            </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href=""><i class="fa fa-angle-right"></i>Food</a>
                          <ul class="treeview-menu">
                            <li><a href="Breakfast.php"><i class="fa fa-angle-right"></i>Breakfast</a></li>
                            <li><a href="Snack.php"><i class="fa fa-angle-right"></i>Snack</a></li>
                            <li><a href="Lunch.php"><i class="fa fa-angle-right"></i>Lunch</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="fa fa-angle-right"></i>Fun</a>
                          <ul class="treeview-menu">
                            <li><a href="FunCheck.php"><i class="fa fa-angle-right"></i>Fun Table</a></li>
                            <li><a href="AddFun.php"><i class="fa fa-angle-right"></i>Add New Fun Event</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="fa fa-angle-right"></i>Songs</a>
                        <ul class="treeview-menu">
                            <li><a href="AddSong.php"><i class="fa fa-angle-right"></i>Add a New Song</a></li>
                            <li><a href="Songs.php"><i class="fa fa-angle-right"></i>Song List</a></li>
                        </ul>
                      </li>

                      <li><a href="ToiletCheck.php"><i class="fa fa-angle-right"></i>Toilet</a></li>
                      <li><a href="SportsCheck.php"><i class="fa fa-angle-right"></i>Sports</a></li>
                  </ul>


<!--                <li class="treeview">-->
<!--                  <a href="#">-->
<!--                  <i class="fa fa-user-md"></i>-->
<!--                  <span>Doctors</span>-->
<!--                  <i class="fa fa-angle-left pull-right"></i>-->
<!--                  </a>-->
<!--                  <ul class="treeview-menu">-->
<!--                    <li><a href="AddNewDoctor.php"><i class="fa fa-angle-right"></i>Add new doctor info</a></li>-->
<!--                    <li><a href="ShowDoctors.php"><i class="fa fa-angle-right"></i>Show Doctors</a></li>-->
<!--                  </ul>-->
<!--                </li>-->

<!--                <li class="treeview">-->
<!--                  <a href="#">-->
<!--                  <i class="fa fa-wrench"></i>-->
<!--                  <span>Services</span>-->
<!--                  <i class="fa fa-angle-left pull-right"></i>-->
<!--                  </a>-->
<!--                  <ul class="treeview-menu">-->
<!--                    <li><a href="AddNewService.php"><i class="fa fa-angle-right"></i>Add new service info</a></li>-->
<!--                    <li><a href="ShowServices.php"><i class="fa fa-angle-right"></i>Show Services</a></li>-->
<!--                  </ul>-->
<!--                </li>-->




                  <!-- Edit Contact Us menu -->
                  <!-- <li class="treeview">
                      <a href="getdata.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Edit Static Pages</span>
                      </a>
                  </li> -->

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