<?php


/**
 *
 */
include_once("Values.php");
include_once("CRUD.php");
class RoleEav implements CRUD
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
    public $RoleAttributes;

    /**
     * @var void
     */
    public $values=array();
    
    /**
     * @var void
     */
    public $page=array();






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
