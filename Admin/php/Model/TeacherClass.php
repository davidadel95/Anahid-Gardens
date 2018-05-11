<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
class TeacherClass implements CRUD
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

    public $ClassID;

    public $AllTeachers;

    public $ClassedTeachers;

    public $Count;

    public $TeachersWithoutClasses;


    public function ShowTeachersWithoutClasses(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * from role where Name = 'Teacher' " ;
        $result = $mysqli->query($sql_query);
        $User = new User;
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
          $this->AllTeachers[$counterAllStudents]=$row["id"];

        }
        $sql_query = " SELECT UserID FROM `userclasscourse`" ;
        $result = $mysqli->query($sql_query);
        while($row =mysqli_fetch_array($result)) {
          $CounterClassedStudents++;
          $RoleIDs[$CounterClassedStudents]=$User->GetRoleID($row["UserID"]);
          if($RoleIDs[$CounterClassedStudents]==$RoleID){
          $this->AllTeachers[$CounterClassedStudents]=$row["UserID"];
          }
        }


        for($Counter1=0;$Counter1<=$counterAllStudents;$Counter1++) {
          $this->isUsed=False;
          for ($Counter2=0;$Counter2<=$CounterClassedStudents;$Counter2++){
                if($this->AllTeachers[$Counter1]==$this->ClassedTeachers[$Counter2]) {
                //  echo $Counter2;
                  $this->isUsed=True;
                }
            }
            if($this->isUsed==False) {
              $this->Count+=1;
              $this->TeachersWithoutClasses[$this->Count]=$this->AllTeachers[$Counter1];
            }
        }
    }
    /**
     * @inheritDoc
     */
    public function Add(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "INSERT INTO userclasscourse(ID,UserID,ClassID)    VALUES ('','$this->UserID','$this->ClassID')";
        echo $sql_query;
        $result = $mysqli->query($sql_query);
    }


    /**
     * @inheritDoc
     */
    public function Edit()
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
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



    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }


}
