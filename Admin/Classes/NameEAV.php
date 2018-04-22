<?php
include_once "dbconnect.php";
include_once "CRUD.php";

/**
 *
 */
class NameEAV implements CRUD
{




    /**
     * @var void
     */
    public $ID;

    /**
     * @var void
     */
    public $Name;

    public $db;

    public $Names;




    public function Add()
    {
      $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = "INSERT INTO Role(ID,Name)    VALUES ('','$this->Name')";
    $result = $mysqli->query($sql_query);




    }

    /**
     * @inheritDoc
     */
    public function Edit()
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function View()
    {

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

    public function GetID($name)
    {
      $db = new dbconnect;
      $db->connect();
      $sql= "SELECT * FROM Role where name = '$name'";
      $result=$db->executesql($sql);
      while($row =mysqli_fetch_array($result)){
          $ID=$row["ID"];
      }
      return $ID;
    }


    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }



}
