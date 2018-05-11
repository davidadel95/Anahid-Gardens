<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";

  class UserDailyHoursModel implements CRUD{
      public $ID;
      public $UserID;
      public $Hours;
      public $isExtra;

      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `UserDailyHours` (`UserID`, `Hours`, `isExtra`) 
                  VALUES ('$this->UserID', '$this->Hours', '$this->isExtra')";

          $result = $mysqli->query($sql);
      }

      public function Edit(){
          // TODO: implement here
      }

      public function View(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM `UserDailyHours`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->UserID[$i]=$row['UserID'];
              $this->Hours[$i]=$row['Hours'];
              $this->isExtra[$i]=$row['isExtra'];
          }
          return $i;
      }
      

      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
