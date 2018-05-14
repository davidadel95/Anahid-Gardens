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
                  VALUES ('$this->ValueToBePaid', '$this->isPaid', NOW(),NOW()+INTERVAL 30 DAY,'$this->UserID')";

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

      public function update($UserID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "UPDATE `SalariesPayment`
                  SET `EndDate` = '$this->EndDate' WHERE UserID = ".$UserID;
          $result = $mysqli->query($sql);
      }
      public function getWorkingHours($UserID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `salariespayment` WHERE UserID = ".$UserID." AND Month(EndDate) = Month(Now())";
          $result = $mysqli->query($sql);
          $i = 0;
          while($row = mysqli_fetch_array($result))
          {
              $this->StartDate = $row['StartDate'];
              $this->EndDate = $row['EndDate'];
          }
          $Diffrence= strtotime($this->EndDate)-strtotime($this->StartDate);
          $Difference = $Difference/60;
          $Difference = $Difference/60;
          return $Difference;
      }
      
      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
