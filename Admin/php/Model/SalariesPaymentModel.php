<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";

  class SalariesPaymentModel implements CRUD{
      public $ID;
      public $ValueToBePaid;
      public $isPaid;
      public $StartDate;
      public $EndDate;
      public $UserID;

      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `SalariesPayment` (`ValueToBePaid`, `isPaid`, `StartDate`,`EndDate`,`UserID`) 
                  VALUES ('$this->ValueToBePaid', '$this->isPaid', '$this->StartDate','$this->EndDate','$this->UserID')";

          $result = $mysqli->query($sql);
      }

      public function Edit(){
          // TODO: implement here
      }

      public function View(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `salariespayment`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ValueToBePaid[$i]=$row['ValueToBePaid'];
              $this->isPaid[$i]=$row['isPaid'];
              $this->StartDate[$i]=$row['StartDate'];
              $this->ID[$i]=$row['ID'];
              $this->EndDate[$i]=$row['EndDate'];
              $this->UserID[$i]=$row['UserID'];
          }
          return $i;
      }

      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
