<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
class NameEAVModel implements CRUD
{
    public $ID;
    public $Name;
    public $db;
    public $Names;

    public function Add(){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO Role(ID,Name)    VALUES ('','$this->Name')";
      $result = $mysqli->query($sql_query);
    }

    public function Edit(){

    }
    public function View(){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM Role";
      $result = $mysqli->query($sql_query);

      $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->Names[$i]=$row["Name"];
      }
      return $i;
    }

    public function GetID($name){
      $db = new dbconnect;
      $db->connect();
      $sql= "SELECT * FROM Role where name = '$name'";
      $result=$db->executesql($sql);
      while($row =mysqli_fetch_array($result)){
          $ID=$row["ID"];
      }
      return $ID;
    }

    public function Delete(){

    }
}
?>
