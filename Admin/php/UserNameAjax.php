<?php
 $q = $_REQUEST["q"];
 $w = $_REQUEST["w"];
 $rootPath = $_SERVER['DOCUMENT_ROOT'];

                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleEAV.php";
                require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
$RoleEav = new RoleEav;
if($RoleEav->CheckUserName($q) == 0){
    echo "<input onblur='CheckUserName(this.value,".$w.")' type='text' value=".$q."  name='value".$w."' class='form-control' placeholder='text'  required >"; 
}
else{
    echo "<input onblur='CheckUserName(this.value,".$w.")' type='text'name='value".$w."' class='form-control' placeholder='UserName already used'  required >";
}
    



?>