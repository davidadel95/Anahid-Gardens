<?php

//    include_once "includes.php";
//    include_once "Model/POptionsModel.php";
//    include_once "Model/PaymentEAVModel.php";
    $q = $_REQUEST["q"];
    if($q != "-Select Payment Type-")
    {
    $POptionsModel = new POptionsModel;
    $PaymentEAVModel = new PaymentEAVModel;
    $ID = $PaymentEAVModel->GetID($q)[0];
    echo '<label>Field Name</label>';
    echo '<select name="FieldNames[]"  class="form-control" multiple>';

										for ($x=0;$x<sizeof($POptionsModel->View());$x++)
										{

											echo "<option value='".$POptionsModel->View()[$x]."'> ".$POptionsModel->View()[$x]."</option>";
										}
    echo '</select>';
        echo '<input type="submit" class="btn btn-success" name="PaymentNameAdded" value="Attach">';
    }
?>
