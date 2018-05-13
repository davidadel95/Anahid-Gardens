<?php
    $q = $_REQUEST["q"];
    require_once "dbconnect.php";
    require_once "Model/CRUD.php";
    require_once "Model/RoleEav.php";
require_once "Model/Attribute.php";
    $RoleEAV= new RoleEav;
    $result=$RoleEAV->GetRadio();
$Attruibute = new Attribute;
$NumberOfAttruibutes=$Attruibute->view();
$Changed=0;
while($row=mysqli_fetch_array($result)){
    if(!strcmp($row['Name'],$q)){
        $Counter=0;
        echo "<div>";
        echo "<input name='".$Counter."'>";
        echo '<button type="button" id="Shaf3y" class="btn btn-success" onclick="AddAnotherButton()"> Add New Field</button>';

        echo "</div>";

        echo "<div id='Shaf3yy'>";
        echo "</div>";
        $Changed=1;
        break;
    }
}

    if($Changed=1){
        echo"<br>
	<input type='hidden' id='calcAjax' name='Field1' value='".$q."'>
	<br> <br>
	<input name='GroupField' type='submit'>";
    }
else {
    echo'<label>Field Name</label>

										<select name="InFiledFieldName"  onchange="GroupAjax(this.value)" class="form-control" >';

										

										for ($x=0;$x<=$NumberOfAttruibutes;$x++)
										{

											echo "<option value='".$Attruibute->Types[$x]."'> ".$Attruibute->Types[$x]."</option>";


										}

										
								echo	'</select>


                                    <br>



									<br> <br>
									<input name="NewInField" type="submit">
';
}

?>
