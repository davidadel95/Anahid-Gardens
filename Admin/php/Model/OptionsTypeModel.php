<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

class OptionsTypeModel implements CRUD
{
    public $ID;
    public $Type;
    public $db;
    public $PTypesArr = array();
    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `optionstypes`(ID,Type)    VALUES ('','$this->Type')";
      $result = $mysqli->query($sql_query);
    }

    public function Edit(){

    }
    public function View(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `optionstypes`";
      $result = $mysqli->query($sql_query);

      $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->PTypesArr[$i]=$row["Type"];
      }
      return $this->PTypesArr;
    }

    public function GetID($name){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query= "SELECT `ID` FROM `optionstypes` WHERE Type = '$name'";
      $result = $mysqli->query($sql_query);
      $ID= $row =mysqli_fetch_array($result);
      return $ID;
    }

    public function Delete(){

    }
    public function GetOptionName($Type)
    {
        $PaymentEAVModel = new PaymentEAVModel;
             $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "SELECT optionstypes.Type FROM optionstypes WHERE optionstypes.ID  = ".$Type;
            $result = $mysqli->query($sql_query);
            
           $row =mysqli_fetch_array($result);
           
    
        return $row["Type"];
    }
}
?>
