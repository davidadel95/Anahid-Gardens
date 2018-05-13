<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
class StudentClass implements CRUD
{

    public function __construct()
    {
    }

    public $ID;

    public $UserID;

    public $ClassID;

    public $AllStudents;

    public $ClassedStudents;

    public $Count;

    public $ChildrenWithoutClasses;

    public $isUsed;


    public function ShowChildWithoutClasses(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * from role where Name = 'Child'" ;
        $result = $mysqli->query($sql_query);
        $row =mysqli_fetch_array($result);
        $RoleID =$row['ID'];
        $this->Count=-1;
        $counterAllStudents=-1;
        $CounterClassedStudents=-1;

        $sql_query = "SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where applicationoptions.Name ='name' And role.ID=$RoleID
                                ORDER BY UserID,OptionTypeID " ;
        $result = $mysqli->query($sql_query);

        while($row =mysqli_fetch_array($result)) {
          $counterAllStudents++;
          $this->AllStudents[$counterAllStudents]=$row["id"];

        }
        $sql_query = " SELECT UserID FROM `userclasscourse`" ;
        $result = $mysqli->query($sql_query);
        while($row =mysqli_fetch_array($result)) {
          $CounterClassedStudents++;
          $this->ClassedStudents[$CounterClassedStudents]=$row["UserID"];

        }


        for($Counter1=0;$Counter1<=$counterAllStudents;$Counter1++) {
          $this->isUsed=False;
          for ($Counter2=0;$Counter2<=$CounterClassedStudents;$Counter2++){
                if($this->AllStudents[$Counter1]==$this->ClassedStudents[$Counter2]) {
                //  echo $Counter2;
                  $this->isUsed=True;
                }
            }
            if($this->isUsed==False) {
              $this->Count+=1;
              $this->ChildrenWithoutClasses[$this->Count]=$this->AllStudents[$Counter1];
            }
        }
    }

    public function Add(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "INSERT INTO userclasscourse(ID,UserID,ClassID)    VALUES ('','$this->UserID','$this->ClassID')";
        $result = $mysqli->query($sql_query);
    }

    public function Edit()
    {
        // TODO: implement here
    }

    public function View(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * FROM userclasscourse";
        $result = $mysqli->query($sql_query);
        return $result;
    }

    public function ViewSpecificClass($ClassID){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = " SELECT *
                        FROM userclasscourse
                        WHERE ClassID=$ClassID";
        $result = $mysqli->query($sql_query);
        return $result;
    }


    public function GetUserClass($UserID)
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = " SELECT *
                      FROM userclasscourse
                      WHERE UserID=$UserID";
      $result = $mysqli->query($sql_query);
      return $result;

    }

    public function viewClassFromClassID($classID){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = " SELECT *
                        FROM userclasscourse
                        WHERE ClassID=$classID";
        $result = $mysqli->query($sql_query);
        $i = -1;

        while ($row = mysqli_fetch_array($result)){
            $i++;
            $this->ID[$i]=$row['ID'];
            $this->UserID[$i]=$row['UserID'];
        }

        return $i;

    }


    public function Delete()
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = " Delete
                      FROM userclasscourse
                      WHERE ClassID='$this->ClassID'";
      $result = $mysqli->query($sql_query);
      
    }




}
