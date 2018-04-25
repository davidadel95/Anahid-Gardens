<?php
  require_once "CRUD.php";
  class CarColorModel implements CRUD{

      public $ID;
      public $Color;

      public function __construct(){
      }
      public function Add(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "INSERT INTO `carcolor` (`ID`, `Color`) 
                VALUES (NULL, '$this->Color')
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
                FROM `carcolor`
                ";
        $result = $mysqli->query($sql);
        $i=-1;

        while($row =mysqli_fetch_array($result)){
          $i++;
          $this->ID[$i]=$row['ID'];
          $this->Color[$i]=$row['Color'];
        }
        return $i;
      }


      public function Delete(){
          // TODO: implement here
      }


  }
?>
