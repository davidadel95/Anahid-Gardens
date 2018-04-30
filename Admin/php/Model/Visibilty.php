<?php
/**
 *
 */
class Visibilty implements CRUD
{
    /**
     *
     */


    /**
     * @var void
     */
    public $Attribute;

    public $RoleID;


    public $FieldID;

    /**
     * @var void
     */
    public $IsVisible;

    public function __construct()
    {


    }

    /**
     * @inheritDoc
     */
    public function Add()
    {
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query= "INSERT INTO Application(ID,RoleID,ApplicationOptionID,isVisible)    VALUES ('','$this->RoleID','$this->FieldID','$this->IsVisible')";
        $result = $mysqli->query($sql_query);
    }

    public function AddAppGroup($GroupName){
      $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
      $sql_query="INSERT INTO applicationgroup (ApplicationGroupName)
      VALUES ('".$GroupName."')";
      $result = $mysqli->query($sql_query);
      return $result;
    }
    public function AddGroup()
    {
        $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query="SELECT max(ApplicationGroupID) FROM applicationgroup";
        $result = $mysqli->query($sql_query);
        $row=mysqli_fetch_array($result);
        $x=$row['max(ApplicationGroupID)'];
        $sql_query= "INSERT INTO Application(RoleID,ApplicationOptionID,isVisible,GroupID)
        VALUES ('$this->RoleID','$this->FieldID','$this->IsVisible','$x')";
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
