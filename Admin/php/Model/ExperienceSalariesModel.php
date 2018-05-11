<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";

  class ExperienceSalariesModel implements CRUD{
      public $ID;
      public $UserID;
      public $Value;

      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `workershourssalary` (`UserID`, `Value`) 
                  VALUES ('$this->UserID', '$this->Value')";

          $result = $mysqli->query($sql);
      }

      public function Edit(){
          // TODO: implement here
      }

      public function View(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `experiencesalaries`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->UserID[$i]=$row['UserID'];
              $this->Value[$i]=$row['Value'];
          }
          return $i;
      }
      
      public function getRecord($UserID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `experiencesalaries` WHERE UserID = ".$UserID;
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID=$row['ID'];
              $this->UserID=$row['UserID'];
              $this->Value=$row['Value'];
          }
          return $this;
      }

      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
