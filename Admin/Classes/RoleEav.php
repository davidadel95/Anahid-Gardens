<?php


/**
 *
 */
include_once("Values.php");
include_once("CRUD.php");

include_once("DBconnect.php");
class RoleEav implements CRUD
{
 
     
     
    public $ID;

    /**
     * @var void
     */
    public $RoleAttributes;

    /**
     * @var void
     */
    public $values=array();
    
    /**
     * @var void
     */
    public $page=array();
    
    public $ApplicationID;
    public $Value;
    public $RoleID;
    

   /**
     *
     */
    public function __construct()
    {
    }

    /**


    /**
     * @inheritDoc
     */
    public function Add()
    {
        
         
            
    }
    public function AddValue($ApplicationID,$Value){
        
        $db = dbconnect::getInstance();
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
         $sql_query = "INSERT INTO applicationvalue (ApplicationID,UserID,value)
                 VALUES ('".$ApplicationID."','".$rows['ID']."','".$Value."')" ;
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
             $sql_query = "SELECT application.ID,RoleID,ApplicationOptionID,isVisible,applicationoptions.Name,applicationoptions.OptionTypeID,optionstypes.Type FROM application INNER JOIN applicationoptions ON application.ApplicationOptionID = applicationoptions.ID
			INNER JOIN optionstypes ON applicationoptions.OptionTypeID = optionstypes.ID WHERE RoleID = '".$this->RoleID."' And isVisible = 1 order by application.ID" ;
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
