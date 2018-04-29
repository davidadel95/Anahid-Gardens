<?php
$q = $_REQUEST["q"];
$w = $_REQUEST["w"];


require_once "Model/CRUD.php";
require_once "Model/TimeSlots.php";
require_once "Model/TimeTable.php";
require_once "dbconnect.php";
$TimeSlots= new TimeSlots;
$result = $TimeSlots->View();
									echo "<div id='ajax'>" ;

$TimeTable = new TimeTable;
$TimeTable->ShowAvailableSlots($w,$q);
$Names;
if($TimeTable->Count>= 0){
 echo "<select name='TimeSlotsID' class='form-control'>";

 for ($i=0;$i<=$TimeTable->Count;$i++)
	{
		$Result= $TimeSlots->GetBeginEnd($TimeTable->AvailabeSlots[$i]);
		while ($row =mysqli_fetch_array($Result)){
			$Begins[$i]=$row["Begin"];
			$Ends[$i]=$row["End"];
		}
	 echo "<option value='".$TimeTable->AvailabeSlots[$i]."'>" .$Begins[$i]."~".$Ends[$i]."</option>" ;

	}
										echo "</select>
											</div>
											</br>";
}
else{
				echo "<br>";
				echo "No Available Slots";
				echo "<br>";
				echo "<br>";
									}

    ?>
