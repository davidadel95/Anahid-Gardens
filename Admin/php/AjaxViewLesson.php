<?php

    $lessonID = $_REQUEST['lessonID'];
//    echo $lessonID;

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Course.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CurriculumModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentRating.php";

      echo " <form method='post'>";
    $curriculum = new CurriculumModel();
    $numberOfLessons = $curriculum->viewLessonDetails($lessonID);

    if (isset($lessonID)){
        if ($numberOfLessons < 0){
            echo "</br>";
            echo "<label style='color: red'><strong>No available lesson detail, please add lesson detail</strong></label>";
        }else{
            echo "<br>";
            echo "<label>Lesson Details </label>";
            for ($i =0; $i<=$numberOfLessons; $i++){
                echo "<h2>".$curriculum->LessonDetails[$i]."</h2>";
            }
        }
        echo "<br>";

    }
?>
