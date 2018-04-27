<?php
$q = $_REQUEST["q"];
$w = $_REQUEST["w"];

include_once "../Classes/TimeSlots.php";
$TimeSlots= new TimeSlots;
$result = $TimeSlots->View();
									echo "<div id='ajax'>" ;
include "../Classes/TimeTable.php";
$TimeTable = new TimeTable;
$TimeTable->ShowAvailableSlots($w,$q);
$Names;

 echo "<select name='TimeSlotsID' class='form-control'>";
 echo $TimeTable->Count;
 for ($i=0;$i<=$TimeTable->Count;$i++)
	{
		$Result= $TimeSlots->GetBeginEnd($TimeTable->AvailabeSlots[$i]);
		while ($row =mysqli_fetch_array($Result)){
			$Begins[$i]=$row["Begin"];
			$Ends[$i]=$row["End"];
		}
		 echo "<option>" .$Begins[$i]."~".$Ends[$i]."</option>" ;

	}
	echo "</select>
											</div>";

    ?>
