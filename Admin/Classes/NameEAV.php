<?php
include_once "dbconnect.php";
include_once "CRUD.php";

/**
 *
 */
class NameEAV implements CRUD
{




    /**
     * @var void
     */
    public $ID;

    /**
     * @var void
     */
    public $Name;

    public $db;

    public $Names;




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
    {

    }

    public function GetID($name)
    {
  
    }


    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }



}
