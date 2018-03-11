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
    {
        $db= new dbconnect;
        $db->connect();
        $sql= "INSERT INTO optionstypes(ID,Type)    VALUES ('','$this->Type')";
        $result=$db->executesql($sql);

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
      $db= new dbconnect;
      $db->connect();
      $sql= "SELECT * FROM optionstypes";
      $result=$db->executesql($sql);
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
