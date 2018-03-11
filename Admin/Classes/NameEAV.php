<?php
include "dbconnect.php";
include "CRUD.php";

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




    public function Add()
    {
      $db = new dbconnect;
      $db->connect();
      $sql= "INSERT INTO Role(ID,Name)    VALUES ('','$this->Name')";
      $result=$db->executesql($sql);


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
