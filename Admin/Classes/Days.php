<?php
include_once "DBconnect.php";
include_once "CRUD.php";


/**
 *
 */
class Days implements CRUD
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
    public $Name;


    /**
     * @inheritDoc
     */
    public function Add()
    {

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
    {      $db = dbconnect::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * FROM days";

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
