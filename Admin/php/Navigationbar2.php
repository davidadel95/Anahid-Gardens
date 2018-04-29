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

                <!-- Trip menu -->
                 <li class="treeview">
                  <a href="#">
                 <i class="fa fa-bus"></i>
                 <span>Events</span>
                 <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="ViewEventType.php"><i class="fa fa-angle-right"></i>Add New Event Type </a></li>
                     <li><a href="ViewEventDetails.php"><i class="fa fa-angle-right"></i>Add New Event </a></li>
                     <li><a href="ViewEvents.php"><i class="fa fa-angle-right"></i>Show Events </a></li>
                     <li><a href="ViewComment.php"><i class="fa fa-angle-right"></i>Add new comment </a></li>
                 </ul>
                 </li>


                <!-- Attendence menu -->
               <li class="treeview">
               <a href="#">
               <i class="fa fa-user-md"></i>
               <span>Attendence</span>
               <i class="fa fa-angle-left pull-right"></i>
               </a>
               <ul class="treeview-menu">
<!--               <li><a href="AttendanceTeachers.php"><i class="fa fa-angle-right"></i>Teachers </a></li>-->
                   <li><a href="ViewClassesAttendance.php"><i class="fa fa-angle-right"></i>Childs </a></li>
                   <li><a href="EarlyLeave.php"><i class="fa fa-angle-right"></i>Leave Form</a>
                   <li><a href="ViewAttendance.php"><i class="fa fa-angle-right"></i>Show Attendance</a>
               </ul>
               </li>


                <!-- Forms menu -->
<!--                <li class="treeview">-->
<!--                  <a href="EditForm.php">-->
<!--                    <i class="fa fa-dashboard"></i>-->
<!--                    <span>Forms</span>-->
<!--                  </a>-->
<!--                </li>-->

               <!-- Nannys menu -->
<!--                <li class="treeview">-->
<!--                 <a href="#">-->
<!--                <i class="fa fa-child"></i>-->
<!--                <span>Nannys</span>-->
<!--                <i class="fa fa-angle-left pull-right"></i>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                <li><a href="AddNanny.php"><i class="fa fa-angle-right"></i>Add Nanny </a></li>-->
<!--                <li><a href="ShowNanny.php"><i class="fa fa-angle-right"></i>Show Nannys </a></li>-->
<!--                </ul>-->
<!--                </li>-->


                <!-- Drivers menu -->
                 <li class="treeview">
                  <a href="#">
                     <i class="fa fa-car"></i>
                     <span>Cars</span>
                     <i class="fa fa-angle-left pull-right"></i>
                   </a>
                   <ul class="treeview-menu">
                       <li><a href="ViewCarType.php"><i class="fa fa-angle-right"></i>Add Car Type </a></li>
                       <li><a href="ViewCarColors.php"><i class="fa fa-angle-right"></i>Add Car Color </a></li>
                       <li><a href="ViewCarData.php"><i class="fa fa-angle-right"></i>Add Car Data </a></li>
                       <li><a href="ViewCarDetails.php"><i class="fa fa-angle-right"></i>View Car Data </a></li>
                   </ul>
                 </li>
                   <li class="treeview">
                  <a href="#">
                     <i class="fa fa-money"></i>
                     <span>Payments</span>
                     <i class="fa fa-angle-left pull-right"></i>
                   </a>
                   <ul class="treeview-menu">
                     <li><a href="ViewTransactions.php"><i class="fa fa-angle-right"></i>View Transactions</a></li>
                     <li><a href=""><i class="fa fa-angle-right"></i>Manipulate Payments</a>
                       <ul class="treeview-menu">
                        <li><a href="CreatePayment.php"><i class="fa fa-angle-right"></i>Add new Payment</a></li>
                        <li><a href="EditPayment.php"><i class="fa fa-angle-right"></i>Edit Payment</a></li>
                        <li><a href=""><i class="fa fa-angle-right"></i>Delete Payment</a></li>
                      </ul></li>
                   </ul>
                 </li>


                 <!-- Applications menu -->
                  <li class="treeview">
                   <a href="#">
                  <i class="fa fa-child"></i>
                  <span an>Applications</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  <li><a href="CreateApplication.php"><i class="fa fa-angle-right"></i>Create New Application</a></li>
                  <li><a href="ViewApplications.php"><i class="fa fa-angle-right"></i>Show Applications </a></li>
                  </ul>
                  </li>




                  <li class="treeview">
                   <a href="#">
                  <i class="fa fa-child"></i>
                  <span an>TimeTable</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">

                  <li><a href="AddCourseTimetable.php"><i class="fa fa-angle-right"></i>Add Class TimeTable</a></li>
                  <li><a href="ViewClassesSchedules.php"><i class="fa fa-angle-right"></i>View TimeTable </a></li>
                  <li><a href="AddTimeSlots.php"><i class="fa fa-angle-right"></i>Add Time Slots</a></li>
                  <li><a href="DeleteTimeSlot.php"><i class="fa fa-angle-right"></i>Delete Time Slot</a></li>
                  </ul>
                  </li>


                  <!-- Courses menu -->
                   <li class="treeview">
                    <a href="#">
                   <i class="fa fa-child"></i>
                   <span an>Courses</span>
                   <i class="fa fa-angle-left pull-right"></i>
                   </a>
                   <ul class="treeview-menu">
                       <li><a href="AddNewCourse.php"><i class="fa fa-angle-right"></i>Add New Course</a></li>
                       <li><a href="AddCourseDetails.php"><i class="fa fa-angle-right"></i>Add Course Details</a></li>
                       <li><a href="AddStudentClass.php"><i class="fa fa-angle-right"></i>Add student to class </a></li>
                       <li><a href="ViewCourses.php"><i class="fa fa-angle-right"></i>Show Course </a></li>
                   </ul>
                   </li>

<!---->
<!--                  <li class="treeview">-->
<!--                    <a href="Classification.php">-->
<!--                      <i class="fa fa-dashboard"></i>-->
<!--                      <span>Edit Data</span>-->
<!--                    </a>-->
<!--                  </li>-->

                   <!-- Create Application menu -->
                   <li class="treeview">
                    <a href="#">
                     <i class="fa fa-list-ul"></i>
                     <span>Classes</span>
                     <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                     <li><a href="AddNewClass.php"><i class="fa fa-angle-right"></i>Add New Class </a></li>
                     <li><a href="ViewClasses.php"><i class="fa fa-angle-right"></i>Show all classes </a></li>

                    </ul>
                   </li>


                  <!-- Settings menu -->
                   <li class="treeview">
                    <a href="#">
                     <i class="fa fa-cog"></i>
                     <span>Settings</span>
                     <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                     <li><a href="AddFood.php"><i class="fa fa-angle-right"></i>Add New Type of Food</a></li>
                     <li><a href="AddNewChecklistItem.php"><i class="fa fa-angle-right"></i>Add New Checklist Category</a></li>
                    </ul>
                   </li>

                  <!-- Edit Contact Us menu -->
                  <li class="treeview">
                      <a href="getdata.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Edit Static Pages</span>
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
