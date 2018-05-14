<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";

  class WorkersHoursSalaryModel implements CRUD{
      public $ID;
      public $BasicHour;
      public $ExtraHour;
      public $DeductionHour;
      public $NormalHours;
      public $RoleID;

      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `workershourssalary` (`BasicHour`, `ExtraHour`, `DeductionHour`,`RoleID`,`NormalHours`) 
                  VALUES ('$this->BasicHour', '$this->ExtraHour', '$this->DeductionHour','$this->RoleID','$this->NormalHours')";

          $result = $mysqli->query($sql);
      }

      public function Edit(){
          // TODO: implement here
      }

      public function View(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `workershourssalary`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->BasicHour[$i]=$row['BasicHour'];
              $this->ExtraHour[$i]=$row['ExtraHour'];
              $this->DeductionHour[$i]=$row['DeductionHour'];
              $this->RoleID[$i]=$row['RoleID'];
              $this->NormalHours[$i]=$row['NormalHours'];
          }
          return $i;
      }
      
      public function getRoleIDData($RoleID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `workershourssalary` WHERE RoleID = ".$RoleID;
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID=$row['ID'];
              $this->BasicHour=$row['BasicHour'];
              $this->ExtraHour=$row['ExtraHour'];
              $this->DeductionHour=$row['DeductionHour'];
              $this->RoleID=$row['RoleID'];
              $this->NormalHours=$row['NormalHours'];
          }
          
          return $this;
      }
      
      public function checkExistingRole2($RoleID)
      {
          $Role = new RoleNameEAV;
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `workershourssalary`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              if($row["RoleID"] == $RoleID)
              {
                  if($Role->GetRoleName($RoleID) == "Child" || $Role->GetRoleName($RoleID) == "Parent")
                      return false;
                  
              }
               return true;   
          }
          
          
      }
      
      public function checkExistingRole($RoleID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `workershourssalary`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              if($row["RoleID"] == $RoleID)
              {
                  if($RoleID == 2)
                      return false;
                  return true;
              }
                  
          }
          
      }

      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
