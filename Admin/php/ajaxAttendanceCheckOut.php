<?php

    $userID = $_REQUEST["userID"];

    $dateWithTime = date('Y-m-d H:i:s', time());
    $date = date('Y-m-d', time());

    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/LeavingModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/AttendanceModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalariesPaymentModel.php";
    
    $SalariesPaymentModel = new SalariesPaymentModel;
    $attendance = new AttendanceModel();
    $checkInDate = $attendance->getCheckInDate(); 
    $attendanceID = $attendance->showAttendanceByDateAndID($date, $userID);

    if ($attendanceID != null){
        $leaving = new LeavingModel();
        $leaving->AttendanceID = $attendanceID;
        $leaving->LeaveTime = $dateWithTime;
        $leaving->Add();
    }else{
        echo "<label style='color: red'><strong>You must check in first</strong></label>";
    }

?>
