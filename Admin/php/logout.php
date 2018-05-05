<?php
/**
 * Created by PhpStorm.
 * User: DavidAdel
 * Date: 5/5/18
 * Time: 11:06 PM
 */
session_start();
session_destroy();
header("location:Login.php");
?>

