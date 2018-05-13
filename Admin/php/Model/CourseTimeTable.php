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

    public $CourseIDs;

    public $ClassIDs;

    public $newCounter;





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


   //b3'd l nazr 3n l 7ss
    public function GetOneRecord($CourseIDs,$ClassIDs,$Counter){
      if($Counter>0){
      $this->CourseIDs[0]=$CourseIDs[0];
      $this->ClassIDs[0]=$ClassIDs[0];
      $this->newCounter=0;
      $bool= True;
      for ($x=1;$x<=$Counter;$x++){
        $bool=True;

        for ($i=$x-1;$i>=0;$i--)
        {

          if( $CourseIDs[$x]==$CourseIDs[$i] && $ClassIDs[$x]==$ClassIDs[$i]){
            $bool=False;
            break;
          }

        }
        if($bool==True){

          $this->newCounter++;

          $this->CourseIDs[$this->newCounter]=$CourseIDs[$x];
          $this->ClassIDs[$this->newCounter]=$ClassIDs[$x-1];

        }

      }
      }
      if ($Counter==0){
        $this->CourseIDs[0]=$CourseIDs[0];
        $this->ClassIDs[0]=$ClassIDs[0];
        $this->newCounter=0;
      }

    }

}
?>
