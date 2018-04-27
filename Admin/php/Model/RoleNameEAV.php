<?php

/**
 *
 */
class RoleNameEAV implements CRUD
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
     * @var void
     */
    public $URL;

    public $Names;

    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = "INSERT INTO Role(ID,Name,LoginUrl)    VALUES ('','$this->Name','$this->URL')";
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
          //$sql_query= "CALL viewRoleNAMEEAV";
          $result = $mysqli->query($sql_query);

            $i=-1;
            while($row =mysqli_fetch_array($result)){
            $i++;
            $this->Names[$i]=$row["Name"];
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

    public function GetID($name)
    {
      $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = "SELECT * FROM Role where name = '$name'";
    $result = $mysqli->query($sql_query);
      while($row =mysqli_fetch_array($result)){
          $ID=$row["ID"];
      }
      return $ID;
    }

}
