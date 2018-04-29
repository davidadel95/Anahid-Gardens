<?php
require_once "Model/DBconnect.php";
require_once "Model/CRUD.php";
require_once "model/RoleNameEAV.php";

			$q = $_REQUEST["q"];
			$RoleNameEAV= new RoleNameEAV;
				$x=$RoleID = $RoleNameEAV->GetID($q);
             $Names;
             $Types;
             $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "      SELECT * FROM application INNER JOIN applicationoptions ON application.ApplicationOptionID = applicationoptions.ID
			INNER JOIN optionstypes ON applicationoptions.OptionTypeID = optionstypes.ID WHERE RoleID = '".$x."' And isVisible = 1 order by application.ID " ;
            $result = $mysqli->query($sql_query);
            $i=-1;
            while($row =mysqli_fetch_array($result)){
            $i++;
            echo "<br />";
            $Names[$i]=$row["Name"];
           $Types[$i]=$row["Type"];
              echo "<label>". $Names[$i]. "</label>";
              echo "<input type='".$Types[$i]."' class='form-control' placeholder='".$Types[$i]." '>";

 }
            ?>
