<?php


/**
 *
 */
class Attendance implements CRUD
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
    public $User;

    /**
     * @var void
     */
    public $Date;

    /**
     * @var void
     */
    public $Attended;


    /**
     * @var \OnLeave
     */
    public $has;

    /**
     *
     */
    public function ThreeDaysOfAbsence():void
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function Add():void
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function Edit():void
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function View():void
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function Delete():void
    {
        // TODO: implement here
    }


}
