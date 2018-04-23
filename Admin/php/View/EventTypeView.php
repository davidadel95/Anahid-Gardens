<?php
  require_once "../Model/EventTypeModel.php";

  class EventTypeView {
      public function __construct(){

      }
      public function showAllEvents(){

          $EventTypeModel = new EventTypeModel;
          $eventTypes= $EventTypeModel->View();

          echo "<select name=\"InFiledRoleName\" id=\"mySelect\" onchange=\"shaf3y(this.value)\" class=\"form-control\" >";
              for ($i=0;$i<=$eventTypes;$i++){
                echo "<option value='".$EventTypeModel->Name[$i]."'> ".$EventTypeModel->Name[$i]."</option>";
              }
          echo "</select";
      }
  }
?>
