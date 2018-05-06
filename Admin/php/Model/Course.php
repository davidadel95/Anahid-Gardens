<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
class Course implements CRUD
{

    public $ID;
    public $Name;


    public function Add()
    {
      $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = "INSERT INTO course(ID,Name)    VALUES ('','$this->Name')";
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
        $sql = "SELECT * FROM Course";

        $result = $mysqli->query($sql);
        $i=-1;

        while($row =mysqli_fetch_array($result)){
            $i++;
            $this->ID[$i]=$row['ID'];
            $this->Name[$i]=$row['Name'];
        }
        return $i;


    }

    public function ViewSpecificCourse($id)
    {
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * FROM Course where ID=$id";

        $result = $mysqli->query($sql_query);
        return $result;


    }


    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }

    // public function GetID($name){
    //
    //   $db = dbconnect::getInstance();
    //   $mysqli = $db->getConnection();
    //   $sql_query = "SELECT ID FROM Course where Name = '$name'";
    //   $result = $mysqli->query($sql_query);
    //   while($row =mysqli_fetch_array($result))
    //   {
    //     return $row["ID"];
    //   }
    // }
}
