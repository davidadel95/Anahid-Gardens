<?php
require_once "includes.php";

$modelID = $_REQUEST['typeID'];


$carType = new CarTypeModel();
$result = $carType->viewCarModels($modelID);
$i = 0;
if ($result){
    echo "<select name=\"modelID\" id=\"mySelect\" class=\"form-control\" >";
    while ($row =mysqli_fetch_array($result)){
        echo "<option value='".$row['ID']."'>".$row['Name']."</option>" ;
        $i++;
    }
    echo "</select>";
}else{
    echo "<select name=\"modelID\" id=\"mySelect\" class=\"form-control\" >";
    echo "<option>No Available Models, please add one</option>" ;
    echo "</select>";
}

echo "<br>";
?>