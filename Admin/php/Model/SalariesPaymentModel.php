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

      public function getSalary($UserID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `salariespayment` WHERE UserID = ".$UserID." AND Month(EndDate) = Month(NOW()) AND Year(EndDate) = Year(NOW())";
          $result = $mysqli->query($sql);
          $i = 0;
          while($row=mysqli_fetch_array($result))
          {
              $this->ID[$i] = $row['ID'];
              $this->ValueToBePaid[$i] = $row['ValueToBePaid'];
              $this->isPaid[$i] = $row['isPaid'];
              $this->StartDate[$i] = $row['StartDate'];
              $this->EndDate[$i] = $row['EndDate'];
              $this->UserID[$i] = $row['UserID'];
              $i++;
          }
          
          return $this;
          
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

      public function getValue($UserID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $month = "Month(NOW())";
          $year = "Year(NOW())";
          $sql = "SELECT *
                  FROM `salariespayment` WHERE UserID = ".$UserID." AND Month(EndDate) = Month(NOW())+1 AND Year(EndDate) = Year(NOW())";
          $result = $mysqli->query($sql);
          $i = 0;
          $row=mysqli_fetch_array($result);
          return $row['ValueToBePaid'];
      }
      
      public function updateValue($value,$UserID,$Date)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          echo $value;
          echo "<br>".$UserID;
          echo"<br>".$Date;
          $sql = "UPDATE `SalariesPayment`
                  SET `ValueToBePaid` = ".$value." WHERE UserID = ".$UserID." AND Month(StartDate) = Month('$Date') AND Year(StartDate) = Year('$Date')
                  ";
          $result = $mysqli->query($sql);
          if (!$result){
              echo $mysqli->error;
          }
      }
      
      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
