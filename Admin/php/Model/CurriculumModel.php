<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
  class CurriculumModel implements CRUD{

      public $ID;
      public $CourseID;
      public $LessonName;
      public $LessonDetail;
      public $NumberOfStars;


      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `curriculum` (`ID`, `CourseID`, `LessonName`, `LessonDetails`,`NumberOfStars`)
                  VALUES (NULL, '$this->CourseID', '$this->LessonName', '$this->LessonDetails','$this->NumberOfStars')
                  ";

          $result = $mysqli->query($sql);
      }

      public function Edit(){

      }

      public function View(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM curriculum

                ";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->CourseID[$i]=$row['CourseID'];
              $this->LessonName[$i]=$row['LessonName'];
              $this->LessonDetails[$i]=$row['LessonDetails'];
          }
          return $i;
      }

      public function ViewSpecificLesson($courseID){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM curriculum
                  WHERE `CourseID` = $courseID
                ";
          $result = $mysqli->query($sql);
          $i=-1;

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->CourseID[$i]=$row['CourseID'];
              $this->LessonName[$i]=$row['LessonName'];
              $this->LessonDetails[$i]=$row['LessonDetails'];
          }

          return $i;
      }

      public function viewLessonDetails($lessonID){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM curriculum
                  WHERE `ID` = $lessonID
                ";
          $result = $mysqli->query($sql);
          $i=-1;
          if($result){
          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID=$row['ID'];
              $this->CourseID[$i]=$row['CourseID'];
              $this->LessonName[$i]=$row['LessonName'];
              $this->LessonDetails[$i]=$row['LessonDetails'];
              $this->NumberOfStars[$i]=$row['NumberOfStars'];
              
          }
          }
          return $i;
      }

      public function viewLessonDetail($lessonID){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "SELECT *
                  FROM curriculum
                  WHERE `ID` = $lessonID
                ";
          $result = $mysqli->query($sql);
          $i=-1;
          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID=$row['ID'];
              $this->CourseID=$row['CourseID'];
              $this->LessonName=$row['LessonName'];
              $this->LessonDetails=$row['LessonDetails'];
              $this->NumberOfStars=$row['NumberOfStars'];
          }
          return $i;
      }
      public function Delete(){

      }
            public function GetNumbersOfStars(){
            $this->NumberOfStars=5;
            return $this->NumberOfStars;

      }
  }
?>
