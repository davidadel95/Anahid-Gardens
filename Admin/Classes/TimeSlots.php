<?php
include_once("DBconnect.php");
include_once("CRUD.php");

/**
 *
 */
class TimeSlots implements CRUD
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
    public $Begin;

    /**
     * @var void
     */
    public $End;


    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Insert into Class (ID,Begin,End) Values ('','$this->Begin','$this->End')";
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
          $sql_query = "Select * from timeslots";
          $result = $mysqli->query($sql_query);
          return $result;
    }

    /**
     * @inheritDoc
     */
    public function Delete()
    {

    }

}
