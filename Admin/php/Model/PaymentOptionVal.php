<?php
// require_once "../dbconnect.php";
require_once "CRUD.php";

class PaymentOptionVal implements CRUD
{
    public $ID;
    public $Value;
    public $db;
    public $POID;
    public $TransactionID;

    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `paymentoptionsvalue`(ID,PaymentOptionsID,Value,TransactionID)    VALUES ('','$this->POID','$this->Value'','$this->TransactionID')";
      $result = $mysqli->query($sql_query);
    }

    public function Edit($NewData){

    }
    public function View(){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `paymentoptionsvalue`";
      $result = $mysqli->query($sql_query);

      return $row =mysqli_fetch_array($result);
    }


    public function Delete(){

    }
}
?>
