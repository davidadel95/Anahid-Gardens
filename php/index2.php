<!DOCTYPE html>
<html lang="en">
<head>
<title>Nursery a Society and People Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link rel="stylesheet" href="../css/easy-responsive-tabs.css">
<link rel="stylesheet" href="../css/jquery.gallery.css">
<link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="../css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
<script src="../js/jquery.vide.min.js"></script>
<!-- header -->
<?php include("Header.php"); ?>
<!-- //header -->

<!-- navigation bar -->
<?php include("NavigationBar.php"); ?>
<!-- //navigation bar -->


<!-- pop-up-box -->

<!-- login -->
<?php include("Login.php"); ?>
<!-- //login -->

<!-- signup -->
<?php include("Signup.php"); ?>
<!-- //signup -->


	<!-- el part beta3 our programs -->
<!-- //pop-up-box -->
<script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
	$('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});

	});
</script>
<!-- video -->
<?php include("VideoSection.php"); ?>
<!-- //video -->

<!-- VideoLearnMore -->
<!-- bootstrap-pop-up -->
<?php include("VideoLearnMore.php"); ?>
<!-- //bootstrap-pop-up -->


<!-- child pictures section -->
<?php include("ChildPictures.php"); ?>
<!-- //child pictures section -->


<!-- programs -->
<?php include("Programs.php"); ?>
<!-- //programs -->

<!-- events -->
<?php include("Events.php"); ?>
<!-- //events -->


<!-- Parent reviews -->
<?php include("ParentReviews.php"); ?>
<!-- //Parent reviews -->

<!-- work -->
<?php include("Work.php"); ?>
<!-- //work -->



<!-- contact -->
<?php include("Contact.php"); ?>
<!-- //contact -->


<!-- footer -->
<?php include("Footer.php"); ?>
<!-- //footer -->


<!-- contact-effect -->
<script src="../js/classie.js"></script>
<script>
	(function() {
		// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
		if (!String.prototype.trim) {
			(function() {
				// Make sure we trim BOM and NBSP
				var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
				String.prototype.trim = function() {
					return this.replace(rtrim, '');
				};
			})();
		}

		[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
			// in case the input is already filled..
			if( inputEl.value.trim() !== '' ) {
				classie.add( inputEl.parentNode, 'input--filled' );
			}

			// events:
			inputEl.addEventListener( 'focus', onInputFocus );
			inputEl.addEventListener( 'blur', onInputBlur );
		} );

		function onInputFocus( ev ) {
			classie.add( ev.target.parentNode, 'input--filled' );
		}

		function onInputBlur( ev ) {
			if( ev.target.value.trim() === '' ) {
				classie.remove( ev.target.parentNode, 'input--filled' );
			}
		}
	})();
</script>
<!-- //contact-effect -->
<!-- work -->
	<script type="text/javascript"  src="../js/jquery.gallery.js" ></script>
	<script>
		$(function() {
			$('.w3_tab_img').createSimpleImgGallery();
		});
	</script>
<!-- //work -->
<!-- flexisel -->
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint:480,
						visibleItems: 1
					},
					landscape: {
						changePoint:640,
						visibleItems:3
					},
					tablet: {
						changePoint:768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script type="text/javascript" src="../js/jquery.flexisel.js"></script>
<!-- //flexisel -->
<!-- team-slider -->
	<script type="text/javascript" src="../js/jquery.glide.js"></script>
	<script type="text/javascript">
		var glide = $('.w3_slider').glide().data('api_glide');

			$(window).on('keyup', function (key) {
				if (key.keyCode === 13) {
					glide.jump(3, console.log('Wooo!'));
				};
			});
	</script>
<!-- //team-slider -->
<!-- responsive-tabs -->
	<script src="../js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
		$('#verticalTab').easyResponsiveTabs({
		type: 'vertical',
		width: 'auto',
		fit: true
		});
		});
	</script>
<!-- //responsive-tabs -->
<!-- text-effect -->
		<script type="text/javascript" src="../js/jquery.transit.js"></script>
		<script type="text/javascript" src="../js/jquery.textFx.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
					$('.test2').textFx({
						type: 'slideIn',
						direction: 'right',
						iChar: 250,
						iAnim: 1000
					});
			});
		</script>
<!-- //text-effect -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<!-- for bootstrap working -->
	<script src="../js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
