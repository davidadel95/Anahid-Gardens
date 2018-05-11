<?php

//    include_once "includes.php";
//    include_once "Model/POptionsModel.php";
//    include_once "Model/PaymentEAVModel.php";
    $q = $_REQUEST["q"];
    $i = 0;
    if($q != "-Select Field Type-")
    {
        if($q == "select")
        {   
            echo "<br/>Field Label: <button class='btn btn-success' type='button' onclick='addField()'>Add Option</button>";
            echo '<input type="text" class="form-control">';
            echo "<br>";
            echo "Options: <br/>";
            echo '<br/><input  style="display:inline" type="text" name="option'.$i.'"><span id="close">x</span>';
        }
        if($q == "radio")
        {
            
        }
    }

    
?>
