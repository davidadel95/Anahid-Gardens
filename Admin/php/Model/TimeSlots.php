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

    public function Availability(){
      $Flag =False;
      $Place=0;
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $x=-1;
      $sql_query = "Select * from timeslots";
      $result = $mysqli->query($sql_query);
      while($row=mysqli_fetch_array($result)){
        $x++;
        $Begins[$x]= $row["Begin"];
        $Ends[$x]= $row["End"];
      }
      if($x==-1)
      {
        $Flag = True;
        return $Flag;
      }
      //Sorting
      for ($Counter=0;$Counter<=$x;$Counter++){
        if($this->Begin==$Begins[$Counter])
        {
          $Flag = False;
          return $Flag;
        }
        else if($this->Begin>$Begins[$Counter]){
          $Place++;
        }
      }
        //Comapare
        if($Place>$x){
            $Diffrence= strtotime($this->Begin)-strtotime($Ends[$x]);
            if ($Diffrence>=0)
            {
              $Flag = True;
              return $Flag;
            }
            else {
              $Flag = False;
              return $Flag;
            }
        }

        if($Place==0){
          $Diffrence= strtotime($Begins[0])-strtotime($this->End);
          if ($Diffrence>=0)
          {
            $Flag = True;
            return $Flag;
          }
          else {
            $Flag = False;
            return $Flag;
          }
        }
        else {
          
            $Diffrence= strtotime($Begins[$Place+1])-strtotime($this->End);
            $Diffrence2=strtotime($this->Begin)-strtotime($Ends[$Place-1]);
            if ($Diffrence && $Diffrence2>=0)
            {
              $Flag = True;
              return $Flag;
            }
            else {
              $Flag = False;
              return $Flag;
            }

        }


        }

  }
