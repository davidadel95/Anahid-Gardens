<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
   <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   <link href="../css/custom.css" rel="stylesheet">
      
      
      
  </head>
  <body>
    <div class="header-left">
      <button id="showLeftPush"><i class="fa fa-bars"></i></button>
    </div>

    <div class="header-right">

      <!--search-box-->
        
        
 
      <a href="logout.php" class="navbar-right user-name" style="padding-right:20px;"  > <span class="glyphicon glyphicon-off" style="font-size:18px;"></span></a>
 
      
 
    
        
        <ul class="nav navbar-nav navbar-right">
 
     <li class="dropdown">
 
      <a href="#"  data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
 
      <ul class="dropdown-menu"></ul>
 
     </li>
 
    </ul>
       
        
 
    

      
   
        
        
      <!--//end-search-box-->

      <div class="profile_details">
          <?php

          $rootPath = $_SERVER['DOCUMENT_ROOT'];

          require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
          require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
          require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";

          $user = new User();
          $result = $user->viewUserName($_SESSION['userID']);

          while ($row = mysqli_fetch_array($result)){
              $name = $row['Value'];
              $role = $row['Name'];
          }

          ?>
        <ul>
          <li class="dropdown profile_details_drop">
           
              <div class="profile_img">
                <span class="prfil-img"><img src="../images/a.png" alt=""> </span>
                <div class="user-name">
                  <p><?php echo $name; ?></p>
                  <span><?php echo $role; ?></span>
                </div>
               
              </div>
           
          </li>
        </ul>
      </div>
         
      <div class="clearfix"> </div>
     
    </div>
      
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

  	<!-- Bootstrap Core JavaScript -->
     <script src="../js/bootstrap.js"> </script>
  	<!-- //Bootstrap Core JavaScript -->

  </body>
</html>
