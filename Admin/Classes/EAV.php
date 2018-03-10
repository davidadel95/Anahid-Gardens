<?php


/**
 *
 */
class EAV implements CRUD
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
    public $Entity;

    /**
     * @var void
     */
    public $Values[];

    /**
     * @var \Entity
     */
    public $Has;


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
