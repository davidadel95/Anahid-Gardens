<?php
  require_once "../Model/EventTypeModel.php";

  class EventTypeView {
      public function __construct(){

      }
      public function showAllEvents(){

          $EventTypeModel = new EventTypeModel;
          $eventTypes= $EventTypeModel->View();

          for ($i=0;$i<=$eventTypes;$i++){
            echo "<option value='".$EventTypeModel->Name[$i]."'> ".$EventTypeModel->Name[$i]."</option>";
          }
      }
  }
?>
