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

    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }





}
