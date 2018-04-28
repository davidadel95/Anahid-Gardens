<?php


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

    public $Begins;

    public $Ends;

    public $Counter;

    public $Counter2;

    public $Flag;

    public $DeletedID;


    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Insert into timeslots (ID,Begin,End) Values ('','$this->Begin','$this->End')";
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
       $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "  DELETE FROM coursetimetable WHERE TimeslotsID=$this->DeletedID";
      $result = $mysqli->query($sql_query);
      $sql_query = " DELETE FROM timeslots WHERE ID=$this->DeletedID";
      $result = $mysqli->query($sql_query);

      }


    
    public function GetBeginEnd($ID){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "Select * from timeslots where ID = $ID";
      $result = $mysqli->query($sql_query);
      return $result;

    }

    // public function Availability(){
    //   $this->Flag = True;
    //   $this->Counter=-1;
    //   $this->Counter2=0;
    //   $db = dbconnect::getInstance();
    //   $mysqli = $db->getConnection();
    //   $sql_query = "Select * from timeslots Order By Begin ASC";
    //   $result = $mysqli->query($sql_query);
    //   if($result){
    //   while ($row=mysqli_fetch_array($result)){
    //       $this->Counter++;
    //       $this->Begins[$this->Counter] = $row["Begin"];
    //       $this->Ends[$this->Counter] = $row["End"];
    //
    //   }
    //   if ($this->Counter>0){
    //     while($this->Flag ==True){
    //       if($this->Begin>)
    //
    //     }
    //   }
    //   else{}
    // }
    //   else {
    //     return True;
    //   }

    // }

}
