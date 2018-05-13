<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleEAV.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";

class User implements CRUD, \SplObserver
{

    public $UserID;
    public $DateAdded;
    public $Status;
    public $RoleEav;
    public $Value;
    public $RoleID;
    public $RoleName;


    public function GetRoleID($UserID){
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
     $sql_query = "select * from user where id=".$UserID;
       $result = $mysqli->query($sql_query);
        $row=mysqli_fetch_array($result);
        return $row['RoleID'];
    }
    public function CountRoles(){
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
     $sql_query = "select * from role";
    $result= $mysqli->query($sql_query); 
    
     $counter=-1;
    while($row=mysqli_fetch_array($result)){
        $counter++;
        $this->RoleID[$counter]=$row['ID'];
        $this->RoleName[$counter]=$row['Name'];
    }
        return $counter;
    }
    public function CountOFUserRole($RoleID){
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
     $sql_query ="SELECT COUNT(*) from user where RoleID = ". $RoleID;
    $result = $mysqli->query($sql_query);
        $row= mysqli_fetch_array($result);
        
        return $row['COUNT(*)'];
    
    }

    public function addDriverCar($User, $Car)
    {
        // TODO: implement here
    }

    public function assignUser($User, $Class, $Course)
    {
        // TODO: implement here
    }


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
                          where	name = 'username' AND value = '".$login[$i]."'
                          ";

              $result=$mysqli->query($sql_query);
              $row = mysqli_fetch_array($result);
              $x=$row['RoleID'];
              $y=$row['UserID'];
              $this->RoleEav= new RoleEav;
              $row = mysqli_fetch_array($result);
              $sql_query="SELECT * FROM role where id = '".$x."'";
              $result=$mysqli->query($sql_query);
              $qrow = mysqli_fetch_array($result);
              session_start();
              $_SESSION['userID'] = $y;
              $_SESSION['roleID'] = $x;
              header("location:".$qrow['LoginUrl']);

          }else {
//              echo "string";
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
    public function GetStatusID($StatusName){
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
        $sql_query="select * from userstatus where Status='".$StatusName."'";
        $result=$mysqli->query($sql_query);
        $row= mysqli_fetch_array($result);
        $this->Status= $row['ID'];
    }
     public function ChangeRole($RoleID,$UserID){
        $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
         
     $sql_query = "UPDATE user SET RoleID = '".$RoleID."' WHERE ID = '".$UserID."'";
        $result = $mysqli->query($sql_query);
    }

    /**
     * @param void $$User
     */
    public function viewAnotherUserInfo($User)
    {   $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
       $sql_query = " SELECT role.Name,applicationoptions.name,applicationvalue.Value,user.RoleID,applicationvalue.ApplicationID
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where user.id = ".$User."
                                ORDER BY UserID,OptionTypeID";
                            $result = $mysqli->query($sql_query);
                                return $result;
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
                                where applicationoptions.Name ='name' and userstatus.status <> 'Unavailable'
                                ORDER BY UserID,OptionTypeID" ; //and userstatus.status <> 'Unavailable'
                                $result = $mysqli->query($sql_query);
                                return $result;
        

    }

    public function  viewUserName($userID){
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
                                AND user.ID = ".$userID."
                                ORDER BY UserID,OptionTypeID" ;
        $result = $mysqli->query($sql_query);
        return $result;
    }
    
    public function getUsername($userID)
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
                                AND user.ID = ".$userID."
                                ORDER BY UserID,OptionTypeID" ;
        $result = $mysqli->query($sql_query);
        $row = mysqli_fetch_array($result);
        return $row["Value"];
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
    
    public function getEmployees()
    {
         
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_query= "SELECT * FROM user WHERE user.RoleID <> 2 AND user.RoleID <> 1";
          $result = $mysqli->query($sql_query);
          $i = 0;
          while($row = mysqli_fetch_array($result))
          {
             $this->ID[$i] = $row['ID']; 
             $this->DateAdded[$i] = $row['DateAdded'];
             $this->Status[$i] = $row['StatusID'];
             $this->RoleID[$i] = $row['RoleID'];
             $i++;
          }
          return $this;
    }

    public function ViewChild()
    {
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * from role where Name = 'Child'" ;
        $result = $mysqli->query($sql_query);
        $row =mysqli_fetch_array($result);
        $RoleID =$row['ID'];

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
        return $result;

    }

    public function ViewChildForClass($ID)
    {
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * from role where Name = 'Child'" ;
        $result = $mysqli->query($sql_query);
        $row =mysqli_fetch_array($result);
        $RoleID =$row['ID'];

        $sql_query = "SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where applicationoptions.Name ='name' And role.ID=$RoleID And User.id=$ID
                                ORDER BY UserID,OptionTypeID " ;
        $result = $mysqli->query($sql_query);
        return $result;

    }

    public function viewChildForClassAndAttendance($ID){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * from role where Name = 'Child'" ;
        $result = $mysqli->query($sql_query);
        $row =mysqli_fetch_array($result);
        $roleID =$row['ID'];

        $sql_query = " SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user 
                                ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus 
                                ON userstatus.ID = user.StatusID
                                INNER JOIN role 
                                ON user.RoleID = role.ID
                                where applicationoptions.Name ='name' 
                                AND role.ID=$roleID 
                                AND User.id=$ID
                                ORDER BY UserID,OptionTypeID 
                                " ;
        $result = $mysqli->query($sql_query);
        if ($result){
            $i = -1;

            while ($row = mysqli_fetch_array($result)){
                $i++;
                $this->UserID[$i]=$row['id'];
                $this->Value[$i]=$row['Value'];
            }

            return $i;

        }else{
            echo $mysqli->error;
        }


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
                                where userstatus.status <> 'Unavailable' 
                                AND applicationoptions.Name ='name'
                                AND (userstatus.Status LIKE '%".$Query."%'
                                OR role.Name LIKE '%".$Query."%'
                                OR applicationvalue.Value LIKE '%".$Query."%')
                                ORDER BY UserID,OptionTypeID";
                                $result = $mysqli->query($sql_query);
                                return $result;
    }

    public function SearchRole($Name)
    {
        $Role = new RoleNameEAV;
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query= "SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where applicationoptions.Name ='name'
                                AND applicationvalue.Value LIKE '%".$Name."%'
                                AND user.RoleID <> 2 AND user.RoleID <> 1";
        $result = $mysqli->query($sql_query);
        $i = 0;
        while($row=mysqli_fetch_array($result))
        {
            $this->ID[$i] = $row['id']; 
            $this->RoleID[$i] = $row['RoleID'];
            $this->DateAdded[$i] = $row['DateAdded'];
            $this->Status[$i] = $row['StatusID'];
            $i++;
        }
        
        return $i;
    }
    
    public function GetNameOfChild($ID){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query = "  SELECT user.id,user.RoleID,applicationvalue.Value,user.DateAdded,user.StatusID,userstatus.Status,role.Name
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                where applicationoptions.Name ='name' And user.ID=$ID
                                ORDER BY UserID,OptionTypeID";
      $result = $mysqli->query($sql_query);
      return $result;
    }
    
    public function GetIDByMail($Email)
    {
          $db = dbconnect::getInstance();
          $mysqli = $db->getConnection();
          $sql_query= "SELECT applicationvalue.UserID FROM `applicationoptions`
                INNER JOIN `application`
                ON applicationoptions.ID = application.ApplicationOptionID
                INNER JOIN `applicationvalue`
                ON application.ID= applicationvalue.ApplicationID
                where Name ='Email'
                AND applicationvalue.Value = '$Email'";
          $result = $mysqli->query($sql_query);
          $ID = mysqli_fetch_array($result);
          return $ID["UserID"];
    }
    
    public function checkUser($UserID)
    {
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * FROM `user` WHERE ID = ".$UserID;
        $RoleNameEAV = new RoleNameEAV;
        $result = $mysqli->query($sql_query);
        if(mysqli_num_rows($result)>0 && $this->GetRoleID($UserID) != 2)
        {
            return true;
        }
        return false;
    }
    
    public function update(\SplSubject $event){
        return "Observer : " . $event->ApplicantInfo;
    }

    public function showAllUsersWithoutChilds(){
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * from role where Name = 'Child' " ;
        $result = $mysqli->query($sql_query);
        $User = new User;
        $row =mysqli_fetch_array($result);
        $roleID =$row['ID'];

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
                                AND role.ID <> $roleID
                                AND role.ID <> 1
                                ORDER BY UserID,OptionTypeID " ;

        $result = $mysqli->query($sql_query);

        $i=-1;
        while($row =mysqli_fetch_array($result)) {
            $i++;
            $this->UserID[$i]=$row['id'];
            $this->Value[$i]=$row["Value"];
        }

        return $i;
    }
}
