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
       public $UsedTimeSlotsID;
       public $AvailabeSlots;
       public $AllTimeSlots;
       public $Count;
       public $isUsed;

          public     $i=-1;
            public   $x=-1;







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
        $this->Count=-1;



        //Used Time Slots
		    while($row =mysqli_fetch_array($result)){
          $this->i++;
          $this->UsedTimeSlotsID[$this->i]=$row['TimeslotsID'];

        }
        $sql = "Select * from timeslots";
        $result= $mysqli->query($sql);
        //all time slots
        while($row =mysqli_fetch_array($result)){
          $this->x++;
          $this->AllTimeSlots[$this->x]=$row['ID'];

        }

        for($Counter1=0;$Counter1<=$this->x;$Counter1++)
        {

          $this->isUsed=False;
          for ($Counter2=0;$Counter2<=$this->i;$Counter2++){

            if($this->AllTimeSlots[$Counter1]==$this->UsedTimeSlotsID[$Counter2])
            {

            //  echo $Counter2;
              $this->isUsed=True;
            }

            }
            if($this->isUsed==False)
            {
              $this->Count+=1;
              $this->AvailabeSlots[$this->Count]=$this->AllTimeSlots[$Counter1];
               


            }
        }

      }
    }
