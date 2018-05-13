<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EventModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleEAV.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Event.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Applicant.php";
$q = $_REQUEST["q"];
$RoleNameEAV = new RoleNameEAV;
$RoleEav = new RoleEav;
$RoleEav->RoleID = $RoleNameEAV->GetID($q);


                    
                    
                    $Names;
                    $Types;
                    $i=-1;
                    $result = $RoleEav->View();
                    while($row =mysqli_fetch_array($result)){
                    $i++;
                    echo "<br />";

                    if(!strcmp($row["Type"],"radio")){
                        echo "<label>". $row["Name"]. " :</label><br/>";
                        echo "<input type='hidden' name='ApplicationID".$i."' value='".$row["ID"]."'>";

                        $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                        $Name =mysqli_fetch_array($NameResult);
                        $SizeResult = $RoleEav->SizeOfRadio($row['Name']);
                        echo "<input  type='".$row["Type"]."' value='".$Name['ApplicationGroupName']."' name='value".$i."'   required>".$Name['ApplicationGroupName']."<br />";
                        $Size=mysqli_num_rows($SizeResult);

                        for($x=1;$x<$Size;$x++){
                        $row = mysqli_fetch_array($result);
                        $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                        $Name =mysqli_fetch_array($NameResult);
                        echo "<input  type='".$row["Type"]."' value='".$Name['ApplicationGroupName']."' name='value".$i."'   required>".$Name['ApplicationGroupName']."<br />";}
                    }
                        elseif(!strcmp($row["Type"],"select")){
                             echo "<label>". $row["Name"]. " :</label><br/>";
                            echo "<input type='hidden' name='ApplicationID".$i."' value='".$row["ID"]."'>";
                            $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                            $Name =mysqli_fetch_array($NameResult);
                            $SizeResult = $RoleEav->SizeOfRadio($row['Name']);
                            $Size=mysqli_num_rows($SizeResult);
                            echo"<select name='value".$i."'>";
                            echo"<option value=".$Name['ApplicationGroupName'].">".$Name['ApplicationGroupName']."</option>";
                            for($x=1;$x<$Size;$x++){
                        $row = mysqli_fetch_array($result);
                        $NameResult = $RoleEav->ShowGroupName($row['GroupID']);
                        $Name =mysqli_fetch_array($NameResult);
                        echo"<option value=".$Name['ApplicationGroupName'].">".$Name['ApplicationGroupName']."</option>";
                       }

                            echo"</select>
                            <br/>";

                        }
                        else{
                    echo "<label>". $row["Name"]. "</label>";
                    echo"<input type='hidden' name='ApplicationID".$i."' value='".$row["ID"]."'>";
                    echo "<input type='".$row["Type"]."' name='value".$i."' class='form-control' placeholder='".$row["Type"]."' required>";
                    }
                    }
                    echo "<br/>
                    <input type='submit' class='btn btn-success'value='Confirm' id='post' name='post'>
                    ";
			
            ?>
