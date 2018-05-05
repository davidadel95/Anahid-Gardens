<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
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
                VALUES (NULL, '$this->TypeID', '$this->ColorID', '$this->YearID', '$this->DriverID', '$this->PlateNb')
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

      public function viewCarDetails(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "  SELECT `caryear`.`Year`, `carcolor`.`Color`, `cartype`.`Name`, `cartype`.`CarTypeID`, `applicationvalue`.`Value`, `cardata`.`PlateNb`
                    FROM `cardata`,`cartype` , `carcolor`, `caryear`, `applicationvalue`
                    WHERE `cardata`.`TypeID` = `cartype`.`ID`
                    AND `cardata`.`ColorID` = `carcolor`.`ID`
                    AND `cardata`.`YearID` = `caryear`.`ID`
                    AND `cardata`.`DriverID` = `applicationvalue`.`UserID`
                    ";

          $result = $mysqli->query($sql);

          return $result;
      }


      public function Delete(){
          // TODO: implement here
      }
  }
?>
