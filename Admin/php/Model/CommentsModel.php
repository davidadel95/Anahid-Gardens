<?php
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
  class CommentsModel implements CRUD{

      public $ID;
      public $EventDetailsID;
      public $Value;


      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `comments` (`ID`, `EventDetailsID`, `Value`) 
                  VALUES (NULL, '$this->EventDetailsID', '$this->Value')
                  ";

          $result = $mysqli->query($sql);
      }

      public function Edit(){

      }

      public function View(){

      }

      public function viewSpecificComment($id){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT * FROM `comments`
                  WHERE `EventDetailsID` = '$id'
                ";
          $result = $mysqli->query($sql);


         $row =mysqli_fetch_array($result);


                 $this->Value=$row['Value'];
          }



      public function Delete(){

      }

  }
?>
