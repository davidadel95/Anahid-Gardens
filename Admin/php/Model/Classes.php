<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
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
    public $ClassID;
    public $Count;

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
   public function CountUsersInClass()
    {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_query ="SELECT ClassID,COUNT(*) FROM `userclasscourse` GROUP BY ClassID";
          $result = $mysqli->query($sql_query);
            $counter=-1;
        while($row=mysqli_fetch_array($result)){
            $counter++;
            $this->ClassID[$counter]=$row['ClassID'];
            $this->Count[$counter]=$row['COUNT(*)'];
        }
       
       return $counter;
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
