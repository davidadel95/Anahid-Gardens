<?php
    // require_once "../dbconnect.php";
require_once "CRUD.php";

class POptionsModel implements CRUD
{
    public $ID;
    public $POption;
    public $db;
    public $TypeID;
    public $POptionsArr;
    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO `poptions`(ID,Name,TypeID) VALUES ('','$this->POption','$this->TypeID')";
      $result = $mysqli->query($sql_query);
    }

    public function Edit(){

    }
    public function View(){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM `poptions`";
      $result = $mysqli->query($sql_query);

      $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->POptionsArr[$i]=$row["Name"];
      }
      return $this->POptionsArr;
    }

    public function GetID($name){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query= "SELECT `ID` FROM `poptions` WHERE Name = '$name'";
      $result = $mysqli->query($sql_query);
      $ID= $row =mysqli_fetch_array($result);
      return $ID;
    }

    public function Delete(){

    }
}
?>
