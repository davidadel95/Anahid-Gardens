<?php
include_once "dbconnect.php";
include_once "CRUD.php";
/**
 *
 */
class AttributeType implements CRUD
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
    public $Type;

    public $db;

    public $Types ;


    /**
     * @inheritDoc
     */
    public function Add()
    {      $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "INSERT INTO optionstypes(ID,Type)    VALUES ('','$this->Type')";
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
     $sql_query = "SELECT * FROM optionstypes";
     $result = $mysqli->query($sql_query);


        $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->Types[$i]=$row["Type"];
      }
      return $i;
    }



    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }


}
