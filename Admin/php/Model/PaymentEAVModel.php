<?php
// require_once "../dbconnect.php";
require_once "CRUD.php";

class PaymentEAVModel implements CRUD
{
    public $ID;
    public $PMethod;
    public $db;
    public $PMethodsArr;
    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `paymentmethods`(ID,PName)    VALUES ('','$this->PMethod')";
      $result = $mysqli->query($sql_query);
    }
    public function Edit()
    {
        
    }
    public function Change($Method){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_query = "UPDATE `paymentmethods` SET `PName` = '".$Method."' WHERE `PName` = '".$this->PMethod."'";
          $result = $mysqli->query($sql_query);

    }
    public function View(){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `paymentmethods`";
      $result = $mysqli->query($sql_query);

      $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->PMethodsArr[$i]=$row["PName"];
      }
      return $this->PMethodsArr;
    }

    public function GetID($name){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query= "SELECT `ID` FROM `paymentmethods` WHERE PName = '$name'";
      $result = $mysqli->query($sql_query);
      $ID= $row =mysqli_fetch_array($result);
      return $ID;
    }

    public function Delete(){

    }
}
?>
