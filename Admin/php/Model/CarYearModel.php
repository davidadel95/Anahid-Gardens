<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
  class CarYearModel implements CRUD{

      public $ID;
      public $Year;

      public function __construct(){
      }
      public function Add(){

      }

      public function Edit(){
          // TODO: implement here
      }


      public function View(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "SELECT * 
                FROM `caryear`
                ";
        $result = $mysqli->query($sql);
        $i=-1;

        while($row =mysqli_fetch_array($result)){
          $i++;
          $this->ID[$i]=$row['ID'];
          $this->Year[$i]=$row['Year'];
        }
        return $i;
      }


      public function Delete(){
          // TODO: implement here
      }


  }
?>
