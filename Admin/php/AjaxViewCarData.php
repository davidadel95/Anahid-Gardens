<?php

    $modelID = $_REQUEST['typeID'];
//    echo $modelID;
    require_once "dbconnect.php";
    require_once "Model/CRUD.php";
    require_once "Model/CarTypeModel.php";

    echo "<label>Available Models </label>";
    $carType = new CarTypeModel();
    $numberOfModels = $carType->viewCarModels($modelID);


    if ($numberOfModels < 0){
        echo "</br>";
        echo "<label style='color: red'><strong>No available model, please add one first</strong></label>";
    }else{
        echo "<select name=\"modelID\" id=\"mySelect\" class=\"form-control\" >";
        for ($i =0; $i<=$numberOfModels; $i++){
            echo "<option value='".$carType->ID[$i]."'> ".$carType->Name[$i]."</option>";
        }
        echo "</select>";
    }
    echo "<br>";
?>
