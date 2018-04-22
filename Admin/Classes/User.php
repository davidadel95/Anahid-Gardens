<?php
include("dbconnect.php");
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
    public function changeStatus($User)
    {
        // TODO: implement here
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
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }
}
