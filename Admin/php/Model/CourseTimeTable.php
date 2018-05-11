<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
class CourseTimeTable implements CRUD
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
    public $CourseID;

    /**
     * @var void
     */
    public $ClassID;

    /**
     * @var void
     */
    public $DaysID;

    /**
     * @var void
     */
    public $TimeSlotID;





    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Insert into coursetimetable (ID,CourseID,ClassID,DaysID,TimeSlotsID) Values ('','$this->CourseID','$this->ClassID','$this->DaysID','$this->TimeSlotsID')";
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
          $sql_query = "Select * from coursetimetable";
          $result = $mysqli->query($sql_query);
          return $result;
    }

    /**
     * @inheritDoc
     */
    public function Delete()
    {

    }

    public function GetSpecificTimeSlot($id)
    {$db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = "Select * from coursetimetable where TimeslotsID =$id";
    $result = $mysqli->query($sql_query);
    return $result;
    }

    public function GetSpecificClass($ID){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Select * from coursetimetable where ClassID =$ID";
      $result = $mysqli->query($sql_query);
      return $result;
    }

    public function GetSpecificTeacher($ID){

      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Select * from coursetimetable where UserID =$ID";
      $result = $mysqli->query($sql_query);
      return $result;
    }


}
