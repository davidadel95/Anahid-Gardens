<?php

    $userID = $_REQUEST["userID"];
    echo $userID;
    $dateWithTime = date('Y-m-d H:i:s', time());

    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/LeavingModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/AttendanceModel.php";

    $attendance = new AttendanceModel();
    $attendance->UserID = $userID;
    $attendance->Date = $dateWithTime;
    $attendance->Attended = 1;
    $attendance->Add();



    $leaving = new LeavingModel();
    $leaving->AttendanceID = $attendaceID;
    $leaving->LeaveTime = $dateWithTime;
?>
