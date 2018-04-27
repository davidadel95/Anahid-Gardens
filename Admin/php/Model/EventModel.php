<?php
  class EventModel implements CRUD{

      public $ID;
      public $Name;
      public $Price;
      public $EventTypeID;


      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `eventdetails` (`EventName`, `Price`, `EventTypeID`) 
                  VALUES ('$this->Name', '$this->Price', '$this->EventTypeID')";

          $result = $mysqli->query($sql);
      }

      public function Edit(){

      }

      public function View(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT eventdetails.ID, eventdetails.EventName, eventdetails.Price, eventtype.Name 
                  FROM `eventdetails`,`eventtype`
                  WHERE eventdetails.EventTypeID = eventtype.ID
                ";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->Name[$i]=$row['EventName'];
              $this->Price[$i]=$row['Price'];
              $this->EventTypeID[$i]=$row['Name'];
          }
          return $i;
      }

      public function Delete(){

      }

  }
?>
