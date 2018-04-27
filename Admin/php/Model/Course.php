<?php


/**
 *
 */
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
        $sql_query = "SELECT * FROM Course";

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
