<?php
require_once "../dbconnect.php";
require_once "CRUD.php";

class UserModel implements CRUD{
    public $UserID;
    public $DateAdded;
    public $Status;
    public $RoleEav;

    public function addDriverCar($User, $Car){

    }

    public function assignUser($User, $Class, $Course){

    }

    public function login($UserName, $Password){

        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();

        $sql="SELECT * FROM `applicationoptions`
                INNER JOIN `application`
                ON applicationoptions.ID = application.ApplicationOptionID
                INNER JOIN `applicationvalue`
                ON application.ID= applicationvalue.ApplicationID
                where Name ='username' OR Name='password'";

        $result = $mysqli->query($sql);

        return $result;

        $login=array();

        While($rows= mysqli_fetch_array($result)){
            array_push($login,$rows['Value']);
            $x=$rows['RoleID'];
        }

        if($login[0] == $UserName && $login[1] == $Password){
              $this->RoleEav= new RoleEav;
              $row = mysqli_fetch_array($result);
              $sql="SELECT * FROM role where id = '".$x."'";
              $result=$db->executesql($sql);
              $qrow = mysqli_fetch_array($result);
              header("location:".$qrow['LoginUrl']);

        }else {
          echo "string";
        }
    }

    public function addAnotherUser($User){

    }

    public function editAnotherUser($User){

    }

    public function changeStatus($User){

    }
    public function viewAnotherUserInfo($User){

    }

    public function hash($Password){

    }

    public function showNav(){

    }

    public function Add(){

    }

    public function Edit(){

    }

    public function View(){

    }

    public function Delete(){

    }
}
?>
