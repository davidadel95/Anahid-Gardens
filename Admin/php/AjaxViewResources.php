<?php

    $modelID = $_REQUEST['typeID'];
//    echo $modelID;
    require_once "dbconnect.php";
    require_once "Model/CRUD.php";
    require_once "Model/ResourceModel.php";

    echo "<label>Available Models </label>";
    $resource = new ResourceModel();
    $numberOfResources = $resource->viewSpecificResource($modelID);


    if ($numberOfResources < 0){
        echo "</br>";
        echo "<label style='color: red'><strong>No available model, please add one first</strong></label>";
    }else{
            echo "<table class='table table-hover'>
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Model Name</th>
                          <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";

                    $j = 1;
                    for ($i=0;$i<=$numberOfResources;$i++){
                        echo "<tr>";
                        echo "<th>".$j."</th>";
                        echo "<td>".$resource->Name[$i]."</td>";
                        echo "<td>".$resource->Quantity[$i]."</td>";
                        echo "</tr>";
                        $j++;
                        }

            echo "</tbody>
                    </table>";
                    $quantity = new ResourceModel();
                    $number = $quantity->getQuantity($modelID);
                    for ($i=0;$i<=$number;$i++){
                        $resourceQuantity = $quantity->Quantity[$i];
                    }

        echo "<h4>Total number: $resourceQuantity</h4>";
    }
    echo "<br>";


?>
