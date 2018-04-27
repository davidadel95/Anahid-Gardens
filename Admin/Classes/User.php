<?php

include("RoleEav.php");
class User implements CRUD
{


    /**
     * @var void
     */
    public $UserID;

    /**
     * @var void
     */
    public $DateAdded;

    /**
     * @var void
     */
    public $Status;

    /**
     * @var void
     */
    public $RoleEav;


    /**
     * @param void $$User
     * @param void $$Car
     */
    
    public function GetRoleID($UserID){
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
     $sql_query = "select * from user where id=".$UserID;
       $result = $mysqli->query($sql_query);
        $row=mysqli_fetch_array($result);
        return $row['RoleID'];
    }

    public function addDriverCar($User, $Car)
    {
        // TODO: implement here
    }

    /**
     * @param void $$User
     * @param void $$Class
     * @param void $$Course
     */
    public function assignUser($User, $Class, $Course)
    {
        // TODO: implement here
    }

    /**
     * @param void $$UserName
     * @param void $$Password
     */
    public function login($UserName, $Password)
    {
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
     $sql_query = "SELECT * FROM `applicationoptions`
             INNER JOIN `application`
             ON applicationoptions.ID = application.ApplicationOptionID
             INNER JOIN `applicationvalue`
             ON application.ID= applicationvalue.ApplicationID
             where Name ='username' OR Name='password'
             ORDER BY UserID,OptionTypeID";
       $result = $mysqli->query($sql_query);

        $login=array();


        while($rows= mysqli_fetch_array($result)){
            array_push($login,$rows['Value']);   
        }

        for($i=0;$i<sizeof($login);$i=$i+2){
        if($login[$i] == $UserName && $login[$i+1] == $Password){
             $sql_query="SELECT * FROM `applicationoptions`
             INNER JOIN `application`
             ON applicationoptions.ID = application.ApplicationOptionID
             INNER JOIN `applicationvalue`
             ON application.ID= applicationvalue.ApplicationID
             where	name = 'username' AND value = '".$login[$i]."'";
              $result=$mysqli->query($sql_query);
              $row = mysqli_fetch_array($result);
                $x=$row['RoleID'];
            $this->RoleEav= new RoleEav;
            $row = mysqli_fetch_array($result);
              $sql_query="SELECT * FROM role where id = '".$x."'";
              $result=$mysqli->query($sql_query);
              $qrow = mysqli_fetch_array($result);
             header("location:".$qrow['LoginUrl']);

        }else {
          echo "string";
        }
    }
    }
    /**
     * @param void $$User
     */
    public function addAnotherUser($User)
    {
        // TODO: implement here
    }

    /**
     * @param void $$User
     */
    public function editAnotherUser($User)
    {
        // TODO: implement here
    }

    /**
     * @param void $$User
     */
     public function ChangeStatus($UserID){
         
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
     $sql_query = "UPDATE `user` SET `StatusID` = '".$this->Status."' WHERE `user`.`ID` = '".$UserID."'";
        $result = $mysqli->query($sql_query);
    }

    /**
     * @param void $$User
     */
    public function viewAnotherUserInfo($User)
    {
        // TODO: implement here
    }

    /**
     * @param void $$Password
     */
    public function hash($Password)
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function showNav()
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function Add()
    {
        // TODO: implement here
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
                   $sql_query = "SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`                                                                                          
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where applicationoptions.Name ='name'
                                ORDER BY UserID,OptionTypeID" ;
                                $result = $mysqli->query($sql_query);
                                return $result;
                                
    }
    public function ViewDriver()
    {
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`                                                                                          
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where applicationoptions.Name ='name' And role.Name='Driver'
                                ORDER BY UserID,OptionTypeID" ;
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
     public function Search($Query)
    {   
        $db = dbconnect::getInstance();
                  $mysqli = $db->getConnection();
                   $sql_query = " SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`                                                                                          
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where applicationoptions.Name ='name' 
                                AND (userstatus.Status LIKE '%".$Query."%' 
                                OR role.Name LIKE '%".$Query."%' 
                                OR applicationvalue.Value LIKE '%".$Query."%')
                                ORDER BY UserID,OptionTypeID";
                            $result = $mysqli->query($sql_query);
                                return $result;
        
    }
}
