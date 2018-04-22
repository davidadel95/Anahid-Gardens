<?php
  include("../Controller/UserController.php");

  $user = new UserController();
  $user->userLogin("hi");

?>
