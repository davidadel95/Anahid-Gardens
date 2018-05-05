<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
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
      public function ViewSpecificDay($id){
        $db = dbconnect::getInstance();
           $mysqli = $db->getConnection();
           $sql_query = "SELECT * FROM days where ID=$id";
           $result = $mysqli->query($sql_query);
           return $result;

      }

}
