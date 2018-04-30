<?php

include_once "Model/CRUD.php";
include_once "Model/EventModel.php";
include_once "dbconnect.php";
			$q = $_REQUEST["q"];
            $y = $_REQUEST["y"];
            if($y != NULL && $q != NULL)
            {
                $EventModel = new EventModel;
                $totalPrice = $y*$EventModel->getEventPrice($q);
                if($q != "-Select Event Name-")
                {
                    echo "<label>Total Price:<br/> ".$totalPrice." LE</label>";
                }else{
                }
            }

 
            ?>
