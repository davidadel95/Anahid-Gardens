<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

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

            //getting child id
            $sql_query = "SELECT * from role where Name = 'Child'" ;
            $result = $mysqli->query($sql_query);
            $row =mysqli_fetch_array($result);
            $childRoleID =$row['ID'];

            $sql_query = "SELECT `attendance`.`Date`, `attendance`.`Attended`, `applicationvalue`.`Value`, `attendance`.`ID`
                            FROM `attendance`, `user`, `applicationvalue`
                            WHERE `attendance`.`Date` LIKE '%$date%'
                            AND `attendance`.`UserID` = user.ID
                            AND `user`.`RoleID` = 2
                            AND `Attended` = 1
                            AND `applicationvalue`.`UserID` = `attendance`.`UserID`
                          ";
            $result = $mysqli->query($sql_query);
            $i=-1;

            while($row =mysqli_fetch_array($result)){
                $i++;
                $this->ID[$i]=$row['ID'];
                $this->UserID[$i]=$row['Value'];
                $this->Date[$i]=$row['Date'];
                $this->Attended[$i]=$row['Attended'];
            }
            return $i;
        }
        public function Delete(){

        }
    }
    ?>
