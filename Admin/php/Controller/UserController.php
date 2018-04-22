<?php
  require_once "../Model/UserModel.php";
  require_once "../View/UserView.php";

  $userModel = new UserModel();
  $userView = new UserView();

  class UserController{
    private $userModel;
    private $userView;

    public function __construct() {
        $this->UserModel = new UserModel();
        $this->UserView = new UserView();
    }
    public function userLogin(){
        $this->userView->login($userModel);
    }

    public function addNewUser($userObj){

    }

  }
?>
