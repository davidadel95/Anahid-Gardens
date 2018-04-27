<?php
  class CarDataModel implements CRUD{

      public $ID;
      public $TypeID;
      public $ColorID;
      public $YearID;
      public $DriverID;
      public $PlateNb;

      public function __construct(){
      }
      public function Add(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "INSERT INTO `cardata` (`ID`, `TypeID`, `ColorID`, `YearID`, `DriverID`, `PlateNb`) 
                VALUES (NULL, '$this->TypeID', '$this->ColorID', '$this->YearID', '', '$this->PlateNb')
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
                FROM `cardata`
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
