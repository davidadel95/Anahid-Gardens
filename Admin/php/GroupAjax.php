<?php
                $q = $_REQUEST["q"];
                require_once "Model/DBconnect.php";
                require_once "Model/CRUD.php";
                require_once "Model/RoleEav.php";
                $RoleEAV= new RoleEav;
$result=$RoleEAV->GetRadio();

while($row=mysqli_fetch_array($result)){
    if(!strcmp($row['Name'],$q)){
        $Counter=0;
        echo "<div>";
        echo "<input name='".$Counter."'>";
        echo '<button type="button" id="Shaf3y" class="btn btn-success" onclick="AddAnotherButton()"> Add New Field</button>';

        echo "</div>";

        echo "<div id='Shaf3yy'>";
        echo "</div>";
    }
}
                                    echo"<br>
                                    

									<input  id='calcAjax' name='calcAjax'>
									<br> <br>
									<input name='GroupField' type='submit'>";

?>
