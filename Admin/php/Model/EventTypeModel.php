<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
  class EventTypeModel implements CRUD{

      public $ID;
      public $Name;

      public function __construct(){
      }
      public function Add(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "INSERT INTO `eventtype` (`ID`, `Name`)
                VALUES ('', '$this->Name')
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

        $sql = "SELECT *
                FROM `eventtype`
                ";
        $result = $mysqli->query($sql);
        $i=-1;

        while($row =mysqli_fetch_array($result)){
          $i++;
          $this->ID[$i]=$row['ID'];
          $this->Name[$i]=$row['Name'];
        }
        return $i;
      }


      public function Delete(){
          // TODO: implement here
      }


  }
?>
