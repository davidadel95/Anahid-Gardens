<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

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
    public function GetID($PMID,$POID){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_querys= "SELECT paymentoptions.ID FROM paymentoptions
          INNER JOIN optionstypes ON paymentoptions.POptionID = optionstypes.ID
          INNER JOIN paymentmethods ON paymentoptions.PaymentMethodID = paymentmethods.ID
          WHERE paymentoptions.PaymentMethodID = ".$PMID."
          AND paymentoptions.POptionID = ".$POID;
          $results = $mysqli->query($sql_querys);
          $ID = mysqli_fetch_array($results);
          return $ID['ID'];
    }

    public function Delete(){

    }
}
?>
