<?php
  require_once "../Model/EventTypeModel.php";

  class EventTypeView {
      public function __construct(){

      }
      public function showAllEvents(){
          $result = EventTypeModel::View();

          for ($i=0; $i<count($result) ; $i++) {
              echo "<a href=StudentController.php?id=".$result[$i]->ID.">".$result[$i]->Name. "</a><br>";
          }
      }
  }
?>
