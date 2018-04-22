<?php
  require_once "../dbconnect.php";
  require_once "CRUD.php";
  class RoleEavModel implements CRUD
  {
      public $ID;
      public $RoleAttributes;
      public $values=array();
      public $page=array();

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

      public function Delete(){
          // TODO: implement here
      }
  }
?>
