<?php

    $courseID = $_REQUEST['courseID'];
//    echo $courseID;

    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Course.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CurriculumModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentRating.php";

    echo " <form method='post'>";
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
        $numberOfLessons = $curriculum->ViewSpecificLesson($courseID);
        echo '<div class="form-group" id="ajax2">';
    $numberOfLessons = $curriculum->viewLessonDetails($curriculum->ID[0]);


        if ($numberOfLessons < 0){
            echo "</br>";
            echo "<label style='color: red'><strong>No available lesson detail, please add lesson detail</strong></label>";
        }else{
            echo "<label>Lesson Details </label>";
            for ($i =0; $i<=$numberOfLessons; $i++){
                echo "<h2>".$curriculum->LessonDetails[$i]."</h2>";
            }
        }
        echo "<br>";
        echo "<label>Rating </label>";


          echo ' <div class="form-group">';
            echo '<div class="stars">';
            $StudentRating = new StudentRating;
            $numberofstars=$StudentRating->GetNumbersOfStars();
            for ($counter=$numberofstars;$counter>=1;$counter--)
            {
                echo '<input class="star"  value="'.$counter.'" id="star-'.$counter.'-2" type="radio" name="star"/>';
                echo '<label class="star" for="star-'.$counter.'-2"></label>';
            }
        echo '</div>';
        echo '</div>';
        echo '  <button type="submit" class="btn btn-success">Submit</button>';
        echo "</form>";
?>
