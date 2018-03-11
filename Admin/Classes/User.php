<?php


/**
 *
 */
include("dbconnect.php");
class User extends EAV implements CRUD
{
    

    /**
     * @var void
     */
    public $UserID;

    /**
     * @var void
     */
    public $DateAdded;

    /**
     * @var void
     */
    public $Status;

    /**
     * @var void
     */
    public $RoleEav;














    /**
     * @param void $$User
     * @param void $$Car
     */
    public function addDriverCar($$User, $$Car)
    {
        // TODO: implement here
    }

    /**
     * @param void $$User
     * @param void $$Class
     * @param void $$Course
     */
    public function assignUser($$User, $$Class, $$Course)
    {
        // TODO: implement here
    }

    /**
     * @param void $$UserName
     * @param void $$Password
     */
    public function login($$UserName, $$Password)
    {
        $sql=
    }

    /**
     * @param void $$User
     */
    public function addAnotherUser($$User)
    {
        // TODO: implement here
    }

    /**
     * @param void $$User
     */
    public function editAnotherUser($$User)
    {
        // TODO: implement here
    }

    /**
     * @param void $$User
     */
    public function changeStatus($$User)
    {
        // TODO: implement here
    }

    /**
     * @param void $$User
     */
    public function viewAnotherUserInfo($$User)
    {
        // TODO: implement here
    }

    /**
     * @param void $$Password
     */
    public function hash($$Password)
    {
        // TODO: implement here
    }

    /**
     *
     */
    public function showNav()
    {
        // TODO: implement here
    }

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
