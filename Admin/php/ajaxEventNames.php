<?php

    include_once "Model/CRUD.php";
    include_once "Model/EventModel.php";
    include_once "dbconnect.php";
    $q = $_REQUEST["q"];
    $EventModel = new EventModel;
    if($q != "-Select Event Type-")
    {
        echo '<label>Event Name</label>';
        echo '<select name="EventName" id="EventName"  class="form-control" onchange="showPrice(this.value)">';
        echo '<option value="SelectEventName">-Select Event Name-</option>';
        for($x = 0 ; $x<sizeof($EventModel->showEventNames($q)) ; $x++)
        {
            echo '<option value="'.$EventModel->showEventNames($q)[$x].'">'.$EventModel->showEventNames($q)[$x].'</option>';
        }
        echo "</select>";
        echo "<br>";
    }
	           
  ?>

<html>
    <body>
        <script>
            
        </script>
    </body>
</html>
