<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->

	<title>Schedule Template | CodyHouse</title>
</head>
<body>
	<?php
				require_once "../Model/CRUD.php";
				require_once "../Model/CourseTimeTable.php";
				require_once "../Model/TimeSlots.php";
				require_once "../Model/Days.php";
				require_once "../Model/Course.php";
				require_once "../dbconnect.php";

				$x=-1;
				$x1=-1;
				$x2=-1;

				$classID = $_REQUEST['id'];
				$CourseTimeTable = new CourseTimeTable;
				$TimeSlot = new TimeSlots;
				$Days = new Days;
				$Course = new Course;
				$AllDaysResult = $Days->View();
					while ($row=mysqli_fetch_array($AllDaysResult)){
							$x2++;
							$AllDays[$x2]=$row['Name'];
							$AllDaysID[$x2]=$row["ID"];
					}

				$result = $CourseTimeTable->GetSpecificClass($classID);
				while($row =mysqli_fetch_array($result)){
					$x++;
					$CourseID[$x]=$row["CourseID"];
					$DaysID[$x]=$row["DaysID"];
					$TimeSlotID[$x]=$row["TimeslotsID"];

				}

				if($x>-1){
					for($Counter=0;$Counter<=$x;$Counter++){
					$TimeSlotResults[$Counter]=$TimeSlot->GetBeginEnd($TimeSlotID[$Counter]);
					$DaysResults[$Counter]=$Days->ViewSpecificDay($DaysID[$Counter]);
					$CoursesResults[$Counter]=$Course->ViewSpecificCourse($CourseID[$Counter]);
				}
				$DaysUsed;
				$Begins;
				$Ends;
				$Courses;




				for($Counter=0;$Counter<=$x;$Counter++){
					while ($row1=mysqli_fetch_array($DaysResults[$Counter])){
						$x1++;
						$DaysUsed[$Counter]=$row1["ID"];

					}

					while ($row2=mysqli_fetch_array($TimeSlotResults[$Counter])){
						$x1++;
						$Begins[$Counter]=$row2["Begin"];
						$Ends[$Counter]=$row2["End"];
					}
					$x1=-1;
					while ($row3=mysqli_fetch_array($CoursesResults[$Counter]))
					{
							$x1++;
							$Courses[$Counter]=$row3["Name"];

					}
				}

}

	?>

<div class="cd-schedule loading">
	<div class="timeline">

		<ul>

			<li><span>08:00</span></li>
			<li><span>08:30</span></li>
			<li><span>09:00</span></li>
			<li><span>09:30</span></li>
			<li><span>10:00</span></li>
			<li><span>10:30</span></li>
			<li><span>11:00</span></li>
			<li><span>11:30</span></li>
			<li><span>12:00</span></li>
			<li><span>12:30</span></li>
			<li><span>13:00</span></li>
			<li><span>13:30</span></li>
			<li><span>14:00</span></li>
			<li><span>14:30</span></li>
			<li><span>15:00</span></li>
			<li><span>15:30</span></li>
			<li><span>16:00</span></li>
			<li><span>16:30</span></li>
			<li><span>17:00</span></li>
		</ul>
	</div> <!-- .timeline -->

	<div class="events">
		<ul>



			<?php

			for($Counter=0;$Counter<=$x2;$Counter++){

				echo '<li class="events-group">';
			echo '<div class="top-info"><span>'.$AllDays[$Counter].'</span></div>';
			echo "<ul>";
			for ($Counter1=0;$Counter1<=$x;$Counter1++){

				if($AllDaysID[$Counter]==$DaysUsed[$Counter1]){
				echo '<li class="single-event" data-start="'.$Begins[$Counter1].'" data-end="'.$Ends[$Counter1].'" data-event="event-1">';
				echo	'<a href="#0">';
				echo	'	<em class="event-name">'.$Courses[$Counter1].'</em>';
			 	echo	'</a>';
			 	echo '</li>';
			}
			}

				echo "</ul>";
				echo '</li>';

				}
			 ?>
		</ul>
	</div>


	<div class="event-modal">
		<header class="header">
			<div class="content">
				<span class="event-date"></span>
				<h3 class="event-name"></h3>
			</div>

			<div class="header-bg"></div>
		</header>

		<div class="body">
			<div class="event-info"></div>
			<div class="body-bg"></div>
		</div>

		<a href="#0" class="close">Close</a>
	</div>

	<div class="cover-layer"></div>
</div> <!-- .cd-schedule -->
<script src="js/modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
