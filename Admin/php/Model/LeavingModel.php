<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

    class LeavingModel implements CRUD{

        public $ID;
        public $AttendanceID;
        public $LeaveTime;


        public function Add(){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            $sql = "INSERT INTO `leaving` (`ID`, `AttendanceID`, `LeaveTime`) 
                    VALUES (NULL, '$this->AttendanceID', '$this->LeaveTime')
                    ";

            $result = $mysqli->query($sql);
            if (!$result){
                echo $mysqli->error;
            }
        }

        public function Edit(){
        }


        public function View(){

        }

        public function Delete(){

        }
    }
    ?>
