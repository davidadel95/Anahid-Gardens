<?php
$q = $_REQUEST["q"];
$w = $_REQUEST["w"];
include_once "../Classes/TimeSlots.php";
$TimeSlots= new TimeSlots;
$result = $TimeSlots->View();

include "../Classes/TimeTable.php";
$TimeTable = new TimeTable;
$TimeTable->AvailableSlots = $TimeTable->ShowAvailableSlots($w,$q);

                                    echo "<div id='ajax'>" ;
									 echo "<select name='TimeSlotsID' class='form-control'>";
									 for ($i=0;$i<3;$i++)
									 	{
											 echo "<option value='".$TimeTable->AvailableSlots[$i]. "'>" .$TimeTable->AvailableSlots[$i]."</option>" ;

										}
										echo "</select>
                                        </div>"

    ?>