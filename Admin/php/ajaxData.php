<?php
//Include database configuration file

require_once "includes.php";
 

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();

    $sql = "SELECT * FROM `curriculum`
            WHERE `CourseID` = ".$_POST['courseID']."
            ";

    $result = $mysqli->query($sql);

    //Count total number of rows
    $rowCount = $mysqli->query($sql)->field_count;

    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Lesson</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['ID'].'">'.$row['LessonName'].'</option>';
        }
    }else{
        echo '<option value="">Lesson not available</option>';
    }
}
?>
