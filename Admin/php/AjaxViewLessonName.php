<?php

    $courseID = $_REQUEST['courseID'];
//    echo $courseID;

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Course.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CurriculumModel.php";


    $curriculum = new CurriculumModel();
    $numberOfLessons = $curriculum->ViewSpecificLesson($courseID);


    if ($numberOfLessons < 0){
        echo "</br>";
        echo "<label style='color: red'><strong>No available lessons, please add one first</strong></label>";
    }else{
        echo "<label>Lesson Name </label>";
        echo "<br>";
        echo "<select name=\"lessonID\" id=\"lessonID\" class=\"form-control\" onchange='David2(this.value)' >";
        for ($i =0; $i<=$numberOfLessons; $i++){
            echo "<option value='".$curriculum->ID[$i]."'> ".$curriculum->LessonName[$i]."</option>";
        }
        echo "</select>";
    }
?>
