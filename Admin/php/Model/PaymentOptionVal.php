<?php

class PaymentOptionVal implements CRUD
{
    public $ID;
    public $Value;
    public $db;
    public $POID;
    public $TransactionID;
    
    public function __construct($PaymentOptionsID,$Value,$TransactionID)
    {
        $this->POID = $PaymentOptionsID;
        $this->Value = $Value;
        $this->TransactionID = $TransactionID;
    }
    
    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `paymentoptionsvalue`(PaymentOptionsID,Value,TransactionID)    VALUES ('$this->POID','$this->Value','$this->TransactionID')";
      $result = $mysqli->query($sql_query);
    }

    public function Edit(){

    }
    public function View(){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `paymentoptionsvalue`";
      $result = $mysqli->query($sql_query);

      return $row =mysqli_fetch_array($result);
    }
    public function GetID($name){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query= "SELECT `ID` FROM `paymentoptionsvalue` WHERE `PaymentOptionsID = '$name'";
      $result = $mysqli->query($sql_query);
      $ID = mysqli_fetch_array($result);
      return $ID;
    }
    

    public function Delete(){

    }
}
?>
