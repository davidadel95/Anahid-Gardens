<?php
  require_once "../Model/UserModel.php";
  require_once "../View/UserView.php";

  $userModel = new UserModel();
  $userView = new UserView();
  $userView->login();

  class UserController{


  }
?>
