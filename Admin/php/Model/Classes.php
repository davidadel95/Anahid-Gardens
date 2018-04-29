<?php

/**
 *
 */
class Classes implements CRUD
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @var void
     */
    public $ID;

    /**
     * @var void
     */
    public $Name;


    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Insert into Class (ID,Name) Values ('','$this->Name')";
      $result = $mysqli->query($sql_query);

    }

    /**
     * @inheritDoc
     */
    public function Edit()
    {

    }

    /**
     * @inheritDoc
     */
    public function View()
    {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_query = "Select * from Class";
          $result = $mysqli->query($sql_query);
          return $result;
    }

    /**
     * @inheritDoc
     */
    public function Delete()
    {

    }

    public function getClassName($classID){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql = "SELECT *
                      FROM `class`
                      WHERE `ID` = $classID
                      ";
        $result = $mysqli->query($sql);
        $i=-1;

        while($row =mysqli_fetch_array($result)){
            $i++;
            $this->ID[$i]=$row['ID'];
            $this->Name[$i]=$row['Name'];
        }
        return $this->Name[0];
    }


    // public function GetID($name){
    //
    //   $db = dbconnect::getInstance();
    //   $mysqli = $db->getConnection();
    //   $sql_query = "SELECT ID FROM Class where Name = '$name'";
    //   $result = $mysqli->query($sql_query);
    //   while($row =mysqli_fetch_array($result))
    //   {
    //     return $row["ID"];
    //   }
    // }

}
