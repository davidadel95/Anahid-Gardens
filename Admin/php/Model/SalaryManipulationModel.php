<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

  class SalaryManipulationModel implements CRUD{
      public $ID;
      public $UserID;
      public $Value;
      public $isBonus;

      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `workershourssalary` (`UserID`, `Date`, `Value`,`isBonus`) 
                  VALUES ('$this->UserID', NOW(), '$this->Value','$this->isBonus')";

          $result = $mysqli->query($sql);
      }

      public function Edit(){
          // TODO: implement here
      }

      public function View(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `salarymanipulation`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->UserID[$i]=$row['UserID'];
              $this->Value[$i]=$row['Value'];
              $this->isBonus[$i]=$row['isBonus'];
          }
          return $i;
      }
      
      
      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
