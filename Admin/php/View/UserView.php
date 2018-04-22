<?php
  require_once "../Model/UserModel.php";

  class UserView{

    public function login($userObj){

      $result = UserModel::login();

    }

  }
?>
