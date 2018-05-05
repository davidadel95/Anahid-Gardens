<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

  class WorkersHoursSalaryModel implements CRUD{
      public $ID;
      public $BasicHour;
      public $ExtraHour;
      public $DeductionHour;
      public $NormalHours;
      public $RoleEav;

      public function __construct(){

      }

      public function Add(){
          // TODO: implement here
      }

      public function Edit(){
          // TODO: implement here
      }

      public function View(){
          // TODO: implement here
      }

      public function Delete()
      {
          // TODO: implement here
      }

  }
?>
