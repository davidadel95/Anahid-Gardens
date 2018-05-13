<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";


class Attribute implements CRUD
{



    public $ID;
    public $Type;
    public $AttributeType;
    public $Types;
    public $AttributeTypes;

    public function Add()
    {
      $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = "Select ID from optionstypes where Type= '$this->AttributeType'" ;

    $result = $mysqli->query($sql_query);
      while($row =mysqli_fetch_array($result)){
        $ID=$row["ID"];
      }

      $sql_query= "INSERT INTO ApplicationOptions(ID,Name,OptionTypeID)    VALUES ('','$this->Type','$ID')";
        $result = $mysqli->query($sql_query);
    }


    public function GetID($Name){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "SELECT * FROM ApplicationOptions where Name = '$Name'" ;
      $result = $mysqli->query($sql_query);

      while($row =mysqli_fetch_array($result)){
          $ID=$row["ID"];
      }
      return $ID;

    }

    public function Edit()
    {
        // TODO: implement here
    }

    public function View()
    {  $db = dbconnect::getInstance();
     $mysqli = $db->getConnection();
     $sql_query = "SELECT * FROM ApplicationOptions";
     $result = $mysqli->query($sql_query);



        $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->ID[$i]=$row["ID"];
        $this->Types[$i]=$row["Name"];
      }
      return $i;
    }


    public function Delete()
    {
        // TODO: implement here
    }





}
