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

            $sql_query = "  SELECT user.id,applicationvalue.Value, attendance.Date, attendance.Attended, attendance.ID
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                INNER JOIN attendance ON user.ID = attendance.UserID
                                WHERE applicationoptions.Name ='name'
                                AND attendance.Attended = 1
                                AND user.RoleID = 2
                                AND attendance.Date LIKE '%$date%'
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

        public function showAttendanceByDateAndID($date, $userID){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            //getting child id
            $sql_query = "SELECT * from role where Name = 'Child'" ;
            $result = $mysqli->query($sql_query);
            $row =mysqli_fetch_array($result);
            $childRoleID =$row['ID'];

            $sql_query = "  SELECT user.id,applicationvalue.Value, attendance.Date, attendance.Attended, attendance.ID
                                FROM `applicationoptions`
                                INNER JOIN `application`
                                ON applicationoptions.ID = application.ApplicationOptionID
                                INNER JOIN `applicationvalue`
                                ON application.ID= applicationvalue.ApplicationID
                                INNER JOIN user ON user.ID = applicationvalue.UserID
                                INNER JOIN userstatus ON userstatus.ID = user.StatusID
                                INNER JOIN role ON user.RoleID = role.ID
                                INNER JOIN attendance ON user.ID = attendance.UserID
                                WHERE applicationoptions.Name ='name'
                                AND attendance.Attended = 1
                                AND user.RoleID <> 2
                                AND attendance.UserID = $userID
                                AND attendance.Date LIKE '%$date%'
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
            return $this->ID[0];
        }
        public function Delete(){

        }
    }
    ?>
