<?php

class PaymentOptionsModel implements CRUD
{
    public $ID;
    public $PMID;
    public $db;
    public $POID;

    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `paymentoptions`(ID,PaymentMethodID,POptionID)    VALUES ('','$this->PMID','$this->POID')";
      $result = $mysqli->query($sql_query);
    }

    public function Edit(){

    }
    public function View(){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `paymentoptions`";
      $result = $mysqli->query($sql_query);

      return $row =mysqli_fetch_array($result);
    }
    public function GetID($name){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query= "SELECT `ID` FROM `paymentoptions` WHERE PaymentMethodID = '$name'";
      $result = $mysqli->query($sql_query);
      $ID= $row =mysqli_fetch_array($result);
      return $ID;
    }

    public function Delete(){

    }
}
?>
