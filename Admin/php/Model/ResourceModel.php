<?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";

    class ResourceModel implements CRUD{

        public $ID;
        public $Name;
        public $Quantity;
        public $ParentID;


        public function Add(){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            $sql = "INSERT INTO `resources` (`ID`, `Name`, `Quantity`, `ParentID`) 
                    VALUES (NULL, '$this->Name', '$this->Quantity', '$this->ParentID')";

            $result = $mysqli->query($sql);
        }

        public function addChildResource($parentID){

            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            $getSql = "SELECT `Quantity` FROM `resources`
                    WHERE ID = $parentID
                    ";

            //get parent quantity
            $quantityResult = $mysqli->query($getSql);

            $i=-1;
            while($row =mysqli_fetch_array($quantityResult)){
                $i++;
                $quantity = $row['Quantity'];
            }


            $sql = "INSERT INTO `resources` (`ID`, `Name`, `Quantity`, `ParentID`)
                    VALUES (NULL, '$this->Name', '$this->Quantity', '$this->ParentID')";


            $result = $mysqli->query($sql);

            $newQuantity = $quantity + $this->Quantity;

            $updateSql ="UPDATE `resources` SET `Quantity` = $newQuantity 
                          WHERE `resources`.`ID` = $parentID
                          ";

            $updateResult = $mysqli->query($updateSql);

        }

        public function getQuantity($parentID){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            $sql = "SELECT * FROM `resources`
                    WHERE `ID` = $parentID
                ";
            $result = $mysqli->query($sql);
            $i=-1;

            while($row =mysqli_fetch_array($result)){
                $i++;
                $this->ID[$i]=$row['ID'];
                $this->Name[$i]=$row['Name'];
                $this->Quantity[$i] = $row['Quantity'];
                $this->ParentID[$i] = $row['ParentID'];
            }
            return $i;
        }

        public function Edit(){
        }


        public function View(){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            $sql = "SELECT * FROM `resources`
                    WHERE `ParentID` = 1
                ";
            $result = $mysqli->query($sql);
            $i=-1;

            while($row =mysqli_fetch_array($result)){
                $i++;
                $this->ID[$i]=$row['ID'];
                $this->Name[$i]=$row['Name'];
                $this->Quantity[$i] = $row['Quantity'];
                $this->ParentID[$i] = $row['ParentID'];
            }
            return $i;
        }

        public function viewSpecificResource($parentID){
            $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();

            $sql = "SELECT * FROM `resources`
                    WHERE `ParentID` = $parentID
                ";
            $result = $mysqli->query($sql);
            $i=-1;

            while($row =mysqli_fetch_array($result)){
                $i++;
                $this->ID[$i]=$row['ID'];
                $this->Name[$i]=$row['Name'];
                $this->Quantity[$i] = $row['Quantity'];
                $this->ParentID[$i] = $row['ParentID'];
            }
            return $i;
        }


        public function Delete(){

        }
    }
    ?>
