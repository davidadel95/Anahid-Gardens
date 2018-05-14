<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";


class RoleEav implements CRUD
{



    public $ID;
    public $RoleAttributes;
    public $values=array();
    public $page=array();
    public $ApplicationID;
    public $Value;
    public $RoleID;

    public function __construct()
    {
    }

    /**


    /**
     * @inheritDoc
     */

    public function Add()
    {       $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
          $sql_querys = "SELECT * FROM userstatus where Status ='Missing Login'" ;
              $results = $mysqli->query($sql_querys);
                $rows=mysqli_fetch_array($results);
                $sql_query = "INSERT INTO user (RoleID,UID,DateAdded,StatusID)
                            VALUES (".$this->RoleID.",1,NOW(),".$rows['ID'].")" ;
                            $result = $mysqli->query($sql_query);
                    $sql_querys = "SELECT * FROM user ORDER BY ID DESC LIMIT 1" ;
                    $results = $mysqli->query($sql_querys);
                    $rows=mysqli_fetch_array($results);
                    return $rows['ID'];
    }
    public function AddValue($ApplicationID,$Value,$ID){

        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
         $sql_query = "INSERT INTO applicationvalue (ApplicationID,UserID,value)
                 VALUES ('".$ApplicationID."','".$ID."','".$Value."')" ;
                $result = $mysqli->query($sql_query);

    }
    public function GetRadio(){

        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
         $sql_query = "SELECT applicationoptions.Name, optionstypes.Type FROM
applicationoptions
INNER JOIN optionstypes on optionstypes.ID = applicationoptions.OptionTypeID
Where optionstypes.Type = 'radio' OR optionstypes.Type ='select'";
                $result = $mysqli->query($sql_query);
        return $result;

    }

    public function Edit()
    {

    }
    public function EditRecord($Record,$ApplicationID,$UserID)
    {
       $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
         $sql_query = " UPDATE applicationvalue
            SET value = '".$Record."'
            WHERE applicationvalue.ApplicationID = '".$ApplicationID."' AND applicationvalue.UserID = '".$UserID."' ";
            $result = $mysqli->query($sql_query);
    }
    /**
     * @inheritDoc
     */
    public function View()
    {
         $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "SELECT application.ID,RoleID,ApplicationOptionID,isVisible,applicationoptions.Name,applicationoptions.OptionTypeID,optionstypes.Type,application.GroupID FROM application INNER JOIN applicationoptions ON application.ApplicationOptionID = applicationoptions.ID
			INNER JOIN optionstypes ON applicationoptions.OptionTypeID = optionstypes.ID WHERE RoleID = '".$this->RoleID."' And isVisible = 1 order by optionstypes.ID, application.ApplicationOptionID, application.ID " ;
            $result = $mysqli->query($sql_query);
          return $result;
    }

     public function ShowGroupName($GroupID){
         $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "SELECT * FROM applicationgroup where ApplicationGroupID = ".$GroupID ;
            $result = $mysqli->query($sql_query);
          return $result;

     }
    public function SizeOfRadio($RadioName){
        $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "SELECT application.ID,RoleID,ApplicationOptionID,isVisible,applicationoptions.Name,applicationoptions.OptionTypeID,optionstypes.Type,application.GroupID FROM application INNER JOIN applicationoptions ON application.ApplicationOptionID = applicationoptions.ID
			INNER JOIN optionstypes ON applicationoptions.OptionTypeID = optionstypes.ID WHERE RoleID = '".$this->RoleID."' And isVisible = 1 AND applicationoptions.Name = '".$RadioName."' order by application.ID" ;
            $result = $mysqli->query($sql_query);
          return $result;
    }
    public function ViewOut()
    {
         $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "SELECT application.ID,RoleID,ApplicationOptionID,isVisible,applicationoptions.Name,applicationoptions.OptionTypeID,optionstypes.Type FROM application INNER JOIN applicationoptions ON application.ApplicationOptionID = applicationoptions.ID
			INNER JOIN optionstypes ON applicationoptions.OptionTypeID = optionstypes.ID WHERE RoleID = '".$this->RoleID."' And isVisible = 0 order by application.ID" ;
            $result = $mysqli->query($sql_query);
          return $result;
    }
    public function CheckUserName($UserName){

        $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "SELECT * FROM `applicationoptions`
             INNER JOIN `application`
             ON applicationoptions.ID = application.ApplicationOptionID
             INNER JOIN `applicationvalue`
             ON application.ID= applicationvalue.ApplicationID
             where Name ='username' AND value='".$UserName."'
             ORDER BY UserID,OptionTypeID";
            $result = $mysqli->query($sql_query);
            return mysqli_num_rows($result);
    }


    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }



}
