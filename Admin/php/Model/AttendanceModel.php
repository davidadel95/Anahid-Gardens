<?php

    class AttendanceModel implements CRUD{

        public $ID;
        public $UserID;
        public $Date;
        public $Attended;


        public function Add(){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            $sql = "INSERT INTO `attendance` (`ID`, `UserID`, `Date`, `Attended`) 
                    VALUES (NULL, '$this->UserID', '$this->Date', '$this->Attended')
                    ";

            $result = $mysqli->query($sql);
        }

        public function Edit(){
        }


        public function View(){

        }

        public function showAttendanceByDate($date){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();
            $sql_query = "SELECT * FROM `attendance`
                          WHERE `attendance`.`Date` LIKE \"%$date%\"
                          ";
            $result = $mysqli->query($sql_query);
            return $result;
        }
        public function Delete(){

        }
    }
    ?>
