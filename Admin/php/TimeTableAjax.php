<?php
$q = $_REQUEST["q"];
$w = $_REQUEST["w"];

include_once "../Classes/TimeSlots.php";
$TimeSlots= new TimeSlots;
$result = $TimeSlots->View();

include "../Classes/TimeTable.php";
									$TimeTable = new TimeTable;
								 	$TimeTable->ShowAvailableSlots($w,$q);



									// echo "<select name='TimeSlotsID' class='form-control'>";
									// while($row =mysqli_fetch_array($result)){
									// 		echo "<option value='".$row["ID"]. "'>" .$row["Begin"]. " ~ " . $row["End"] ."</option>" ;
									//
									//  }
									//  echo "</select>"
                                           echo "<div id='ajax'>" ;
									 echo "<select name='TimeSlotsID' class='form-control'>";
									 echo $TimeTable->Count;
									 for ($i=0;$i<=$TimeTable->Count;$i++)
									 	{

											 echo "<option>" .$TimeTable->AvailabeSlots[$i]."</option>" ;

										}
										echo "</select>
                                        </div>";

    ?>