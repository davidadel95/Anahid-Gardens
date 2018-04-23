<?php
  require_once "../Model/EventTypeModel.php";
  require_once "../View/EventTypeView.php";

  // $eventTypeModel = new EventTypeModel();
  // $eventTypeView = new EventTypeView();
  //
  // $eventTypeView->showAllEvents();

  class EventTypeController{
    private $eventTypeModel;
    private $eventTypeView;

    public function __construct() {
        $this->$eventTypeModel = new EventTypeModel();
        $this->$eventTypeView = new EventTypeView();
    }
    public function showAllEvents(){
        $this->$eventTypeView->showAllEvents();
    }

  }
?>
