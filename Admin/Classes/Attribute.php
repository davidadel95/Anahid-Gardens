<?php
include_once "dbconnect.php";
include_once "CRUD.php";

/**
 *
 */
class Attribute implements CRUD
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

    /**
     * @var void
     */
    public $AttributeType;

    public $Types;

    public $AttributeTypes;




    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db= new dbconnect;
      $db->connect();
      $sql= "Select ID from optionstypes where Type='$this->AttributeType'";
      $result=$db->executesql($sql);
      while($row =mysqli_fetch_array($result)){
        $ID=$row["ID"];
      }

      $sql= "INSERT INTO ApplicationOptions(ID,Name,OptionTypeID)    VALUES ('','$this->Type',$ID)";
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
      $sql= "SELECT * FROM ApplicationOptions";
      $result=$db->executesql($sql);
        $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->ID[$i]=$row["ID"];
        $this->Types[$i]=$row["Name"];
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
