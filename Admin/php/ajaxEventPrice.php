<?php

    require_once "includes.php";
			$q = $_REQUEST["q"];
            $y = $_REQUEST["y"];
            if($y != NULL && $q != NULL)
            {
                $EventModel = new EventModel;
                $totalPrice = $y*$EventModel->getEventPrice($q);
                if($q != "SelectEventName")
                {
                    echo "<label>Total Price:<br/> ".$totalPrice." LE</label>";
                }
            }
			
            
            
 
            ?>
