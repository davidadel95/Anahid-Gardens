<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
  class UserStatusModel implements CRUD{

      public $ID;
      public $Status;

      public function __construct(){
      }
      public function Add(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "INSERT INTO `userstatus` (`ID`, `Status`) 
                VALUES (NULL, '$this->Status')
                ";
        $result = $mysqli->query($sql);

        if (!$result) {
          die('Invalid query: ' . $mysqli->error);
        }
      }

      public function Edit(){
          // TODO: implement here
      }


      public function View(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "SELECT * 
                FROM `userstatus`
                ";
        $result = $mysqli->query($sql);
        $i=-1;

        while($row =mysqli_fetch_array($result)){
          $i++;
          $this->ID[$i]=$row['ID'];
          $this->Status[$i]=$row['Status'];
        }
        return $i;
      }


      public function Delete(){
          // TODO: implement here
      }


  }
?>
