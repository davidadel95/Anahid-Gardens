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
    public function View()
    {

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
    public function ViewSpecificChildForDay($UserID,$Day)
    {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_query = "Select * From studentrating where UserID=$UserID and Date='$Day'";
          $Counter=-1;
          $result = $mysqli->query($sql_query);
          if($result){
            while ($row = mysqli_fetch_array($result)){
              $Counter++;
              $this->CurriculumID[$Counter]=$row['CurriculumID'];
              $this->Rating[$Counter]=$row['Rating'];
              }
            }

          return $Counter;
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









        }
