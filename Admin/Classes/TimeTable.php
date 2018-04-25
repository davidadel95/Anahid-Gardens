<?php
include_once("DBconnect.php");
include_once("CRUD.php");

/**
 *
 */
class TimeTable implements CRUD
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
    public $TimeslotsID;








    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Insert into coursetimetable (ID,CourseID,ClassID,DaysID,TimeslotsID) Values ('','$this->CourseID','$this->ClassID','$this->DaysID','$this->TimeslotsID')";
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



    public function ShowAvailableSlots($ClassID,$DaysID){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "Select * from coursetimetable where ClassID = $ClassID and DaysID=$DaysID";
        $result = $mysqli->query($sql_query);
        $UsedTimeSlotsID;
        $AvailabeSlots;
        $AllTimeSlots;
        $Count;
        $isUsed =False;
        $i=-1;
        $x=-1;
        //Used Time Slots
		    while($row =mysqli_fetch_array($result)){
          $i++;
          $UsedTimeSlotsID[$i]=$row['TimeslotsID'];
        }
        $sql = "Select * from timeslots";
        $result= $mysqli->query($sql);
        //all time slots
        while($row =mysqli_fetch_array($result)){
          $x++;
          $AllTimeSlots[$x]=$row['ID'];
        }
        for($Counter1=0;$Counter1<=$x;$Counter1++)
        {
          $isUsed=False;
          for ($Counter2=0;$Counter2<=$i;$Counter2++){

            {
            if($AllTimeSlots[$Counter1]==$UsedTimeSlots[$Counter2])
            {
              $isUsed=True;
              break;
            }

            }
            if($isUsed==False)
            {
              $AvailabeSlots[$Count]=$AllTimeSlots[$Counter1];
              $Count++;
            }
      }
      }
      return $AvailabeSlots;




    }

}
