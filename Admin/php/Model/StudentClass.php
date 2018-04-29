<?php
/**
 *
 */
class StudentClass implements CRUD
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

    public $AllStudents;

    public $ClassedStudents;

    public $Count;

    public $ChildrenWithoutClasses;


    public function ShowChildWithoutClasses()
    {
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
        while($row =mysqli_fetch_array($result))
        {
          $counterAllStudents++;
          $this->AllStudents[$counterAllStudents]=$row["id"];

        }
        $sql_query = " SELECT UserID FROM `userclasscourse`" ;
        $result = $mysqli->query($sql_query);
        while($row =mysqli_fetch_array($result))
        {
          $CounterClassedStudents++;
          $this->ClassedStudents[$CounterClassedStudents]=$row["UserID"];

        }


        for($Counter1=0;$Counter1<=$counterAllStudents;$Counter1++)
        {

          $this->isUsed=False;
          for ($Counter2=0;$Counter2<=$CounterClassedStudents;$Counter2++){

            if($this->AllStudents[$Counter1]==$this->ClassedStudents[$Counter2])
            {

            //  echo $Counter2;
              $this->isUsed=True;
            }

            }
            if($this->isUsed==False)
            {

              $this->Count+=1;
              $this->ChildrenWithoutClasses[$this->Count]=$this->AllStudents[$Counter1];



            }

    }
    }
    /**
     * @inheritDoc
     */
    public function Add()
    {      $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "INSERT INTO userclasscourse(ID,UserID,ClassID)    VALUES ('','$this->UserID','$this->ClassID')";
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
    public function View()
    {
       $db = dbconnect::getInstance();
     $mysqli = $db->getConnection();
     $sql_query = "SELECT * FROM userclasscourse";
     $result = $mysqli->query($sql_query);
     return $result;
    }
    public function ViewSpecificClass($ClassID)
    {
       $db = dbconnect::getInstance();
     $mysqli = $db->getConnection();
     $sql_query = "SELECT * FROM userclasscourse WHERE ClassID=$ClassID";
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
