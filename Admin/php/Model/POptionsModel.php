<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
class POptionsModel implements CRUD
{
    public $ID;
    public $POption;
    public $db;
    public $TypeID;
    public $POptionsArr;
    public $POptionsID;
    public $POptionsNames;
    public $options;
    public $NotThereArr;
    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `poptions`(ID,Name,TypeID) VALUES ('','$this->POption','$this->TypeID')";
      $result = $mysqli->query($sql_query);
    }
    public function Edit()
    {
        
    }
    public function Change($OldID)
    {
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
      $ID =mysqli_fetch_array($result);
      return $ID;
    }
    
    public function GetOptionsNames($ID)
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query= "SELECT poptions.Name FROM paymentmethods INNER JOIN paymentoptions ON paymentoptions.PaymentMethodID = paymentmethods.ID INNER JOIN poptions ON poptions.ID = paymentoptions.POptionID WHERE paymentmethods.ID = ".$ID;
      $result = $mysqli->query($sql_query);
      $i=-1;
      while($row =mysqli_fetch_array($result)){
          $i++;
          $this->options[$i] = $row["Name"];
      }
      return $this->options;
    }
    
    public function GetNotOptionsNames($ID)
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
          $sql_query= "SELECT poptions.Name FROM poptions  WHERE ";
       for($x = 0 ; $x<sizeof($this->GetOptionsNames($ID));$x++)
       {
           if($x == sizeof($this->GetOptionsNames($ID))-1)
           {
               $sql_query.= "Name <> '".$this->GetOptionsNames($ID)[$x]."'";
               break;
           }
           $sql_query.= "Name <> '".$this->GetOptionsNames($ID)[$x]."' AND";
       }
        $result = $mysqli->query($sql_query);
        $i = 0;
        while($row =mysqli_fetch_array($result)){
        $this->NotThereArr[$i] = $row["Name"];
            $i++;
      }
          
      return $this->NotThereArr;
    }
    
    public function Delete(){

    }
}
?>
