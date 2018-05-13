<?php


$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

class StudentRating implements CRUD
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
    public $UserID;

    /**
     * @var void
     */
    public $CurriculumID;

    /**
     * @var void
     */
    public $Rating;


    /**
     * @var void
     */
     public $NumberOfStars;

     public $date;



    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "INSERT INTO studentrating (ID,UserID,CurriculumID,Rating,`Date`) VALUES ('',$this->UserID,$this->CurriculumID,$this->Rating,'$this->date')";
      $result = $mysqli->query($sql_query);
      return $result;

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
          $sql_query = "";
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
      $sql_query = " ";
      $result = $mysqli->query($sql_query);
      $sql_query = "";
      $result = $mysqli->query($sql_query);

      }

      public function GetNumbersOfStars(){
            $this->NumberOfStars=5;
            return $this->NumberOfStars;

      }







        }
