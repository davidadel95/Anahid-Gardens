<?php
include_once "Attribute.php";
include_once "dbconnect.php";
include_once "CRUD.php";
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
