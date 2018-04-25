<?php
    // require_once "../dbconnect.php";
require_once "CRUD.php";
require_once "OptionsTypeModel.php";
class POptionsModel implements CRUD
{
    public $ID;
    public $POption;
    public $db;
    public $TypeID;
    public $POptionsArr;
    public $POptionsID;
    public $POptionsNames;
    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `poptions`(ID,Name,TypeID) VALUES ('','$this->POption','$this->TypeID')";
      $result = $mysqli->query($sql_query);
    }

    public function Edit($OldID){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_query = "UPDATE `poptions` SET `Name` = '".$this->POption."' WHERE `ID` = '".$OldID."'";
          $result = $mysqli->query($sql_query);
    }
    public function View(){
      $OptionsTypeModel = new OptionsTypeModel;
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `poptions`";
      $result = $mysqli->query($sql_query);  
      $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->POptionsArr[$i] = $row["Name"];
        $this->POptionsID[$i] = $row["TypeID"];
      }
      for($x = 0 ; $x<sizeof($this->POptionsID);$x++)
      {
          $sqlquery = "SELECT * FROM `optionstypes` WHERE `ID` = ".$this->POptionsID[$x];
          $resultQuery = $mysqli->query($sqlquery);
          while($rows = mysqli_fetch_array($resultQuery)){
            $this->POptionsNames[$x] = $rows["Type"];
          }
      }
      return [$this->POptionsArr,$this->POptionsNames];
    }
    
    public function EditType($Option,$Type)
    {
        $OptionsTypeModel = new OptionsTypeModel;
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "UPDATE `poptions` SET `TypeID` = ".$OptionsTypeModel->GetID($Type)[0]." WHERE `Name` = '$Option'";
        $result = $mysqli->query($sql_query);
    }
    
    public function GetID($name){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query= "SELECT `ID` FROM `poptions` WHERE Name = '$name'";
      $result = $mysqli->query($sql_query);
      $ID= $row =mysqli_fetch_array($result);
      return $ID;
    }

    public function Delete(){

    }
}
?>
