<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
  class CurriculumModel implements CRUD{

      public $ID;
      public $CourseID;
      public $LessonName;
      public $LessonDetail;


      public function __construct(){

      }

      public function Add(){
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();

          $sql = "INSERT INTO `curriculum` (`ID`, `CourseID`, `LessonName`, `LessonDetails`)
                  VALUES (NULL, '$this->CourseID', '$this->LessonName', '$this->LessonDetails')
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

          while($row =mysqli_fetch_array($result)){
              $i++;
              $this->ID[$i]=$row['ID'];
              $this->CourseID[$i]=$row['CourseID'];
              $this->LessonName[$i]=$row['LessonName'];
              $this->LessonDetails[$i]=$row['LessonDetails'];
          }
          return $i;
      }
      public function Delete(){

      }

      public function ViewSpecficCourseID($CourseID){

        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql = "SELECT *
                FROM curriculum
                WHERE `CourseID` = $CourseID
              ";
        $result = $mysqli->query($sql);
        if($result){
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
      }

  }
?>
