<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
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
   <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   <link href="../css/custom.css" rel="stylesheet">

  </head>
  <body>
    <div class="header-left">
      <button id="showLeftPush"><i class="fa fa-bars"></i></button>
    </div>

    <div class="header-right">

      <!--search-box-->
      <div class="search-box">
        <form class="input">
          <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
          <label class="input__label" for="input-31">
            <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
              <path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
            </svg>
          </label>
        </form>
      </div><!--//end-search-box-->

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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <div class="profile_img">
                <span class="prfil-img"><img src="../images/a.png" alt=""> </span>
                <div class="user-name">
                  <p><?php echo $name; ?></p>
                  <span><?php echo $role; ?></span>
                </div>
                <i class="fa fa-angle-down lnr"></i>
                <i class="fa fa-angle-up lnr"></i>
                <div class="clearfix"></div>
              </div>
            </a>
            <ul class="dropdown-menu drp-mnu">
<!--              <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>-->
<!--              <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>-->
<!--              <li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li>-->
              <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
            </ul>
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
