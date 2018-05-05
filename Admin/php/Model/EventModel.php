<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

  class EventModel implements CRUD{

      public $ID;
      public $Name;
      public $Price;
      public $EventTypeID;
      public $EventTypeArr;
      public $EventNamesArr;
      
      
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
      public function getEventName($ID)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT * FROM `eventdetails` WHERE ID = ".$ID;
          $result = $mysqli->query($sql);
          $i=-1;

          $row =mysqli_fetch_array($result);
           return $row["EventName"];
      }
       public function ShowEvents()
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT * FROM `eventtype`";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->EventTypeArr[$i]=$row["Name"];
          }
           return $this->EventTypeArr;
      }
      
      public function showEventNames($x)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT eventdetails.EventName
                  FROM `eventdetails`
                  INNER JOIN `eventtype` ON eventdetails.EventTypeID = eventtype.ID
                  WHERE eventtype.Name = '$x'";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->EventNamesArr[$i]=$row["EventName"];
          }
           return $this->EventNamesArr;
      }
      
      public function getEventPrice($x)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql="SELECT eventdetails.Price FROM eventdetails
                WHERE eventdetails.EventName = '$x'";
          $result = $mysqli->query($sql);
          $row = mysqli_fetch_array($result);
          return $row["Price"];
      }
      
      public function getEventID($x)
      {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql="SELECT eventdetails.ID FROM eventdetails
                WHERE eventdetails.EventName = '$x'";
          $result = $mysqli->query($sql);
          $row = mysqli_fetch_array($result);
          return $row["ID"];
      }

  }
?>
