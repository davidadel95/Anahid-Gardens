<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

class TransactionModel implements CRUD
{
    public $ID;
    public $UserID;
    public $db;
    public $EventID;
    public $Date;
    public $Amount;
    public $Quantity;
    public $transactionsArr;
    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `transaction` (`UserID`, `EventID`, `Date`, `Quantity`) VALUES ('$this->UserID','$this->EventID', NOW(), '$this->Quantity')";
      $result = $mysqli->query($sql_query);
    }
    public function Edit()
    {
        
    }
    public function Change($Method){
    }
    public function View(){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `transaction`";
      $result = $mysqli->query($sql_query);

      $i=-1;
      while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->UserID[$i]=$row['UserID'];
              $this->EventID[$i]=$row['EventID'];
              $this->Date[$i]=$row['Date'];
              $this->Amount[$i]=$row['Quantity'];
          }
    }
    
    

    public function Delete(){

    }
    
    public function getTransaction($ID)
    {
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `transaction` WHERE ID = ".$ID;
      $result = $mysqli->query($sql_query);

      $row =mysqli_fetch_array($result);
        return $row;
    }
    
    public function getLastTransaction()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT `transaction`.`ID` FROM `transaction` ORDER BY `transaction`.`ID` DESC LIMIT 1 ";
      $result = $mysqli->query($sql_query);
      $ID = mysqli_fetch_array($result);
      return $ID;
    }
}
?>
