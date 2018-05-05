<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

  class CarTypeModel implements CRUD{

      public $ID;
      public $Name;
      public $CarTypeID;

      public function __construct(){
      }
      public function Add(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "INSERT INTO `cartype` (`ID`, `Name`, `CarTypeID`) 
                VALUES (NULL, '$this->Name', '1')
                ";
        $result = $mysqli->query($sql);

        if (!$result) {
          die('Invalid query: ' . mysqli_error());
        }
      }

      public function addCarModel(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `cartype` (`ID`, `Name`, `CarTypeID`) 
                  VALUES (NULL, '$this->Name', '$this->CarTypeID')
                ";
          $result = $mysqli->query($sql);

          if (!$result) {
              die('Invalid query: ' . mysqli_error());
          }

      }

      public function Edit(){
          // TODO: implement here
      }


      public function View(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "SELECT * FROM `cartype`
                WHERE `CarTypeID` 
                = 1
                ";
        $result = $mysqli->query($sql);
        $i=-1;

        while($row =mysqli_fetch_array($result)){
          $i++;
          $this->ID[$i]=$row['ID'];
          $this->Name[$i]=$row['Name'];
          $this->CarTypeID[$i]=$row['CarTypeID'];
        }
        return $i;
      }

      public function viewCarModels($idParent){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT * FROM `cartype`
                  WHERE `CarTypeID` 
                  = $idParent
                ";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->Name[$i]=$row['Name'];
              $this->CarTypeID[$i]=$row['CarTypeID'];
          }
          return $i;
      }


      public function Delete(){
          // TODO: implement here
      }


  }
?>
