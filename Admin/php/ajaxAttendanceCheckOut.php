<?php

    $userID = $_REQUEST["userID"];

    $dateWithTime = date('Y-m-d H:i:s', time());
    $date = date('Y-m-d', time());

    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/LeavingModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/AttendanceModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalariesPaymentModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/WorkersHoursSalaryModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ExperienceSalariesModel.php";
    
    $User = new User;
    $ExperienceSalariesModel = new ExperienceSalariesModel;
    if($ExperienceSalariesModel->getExpVal($userID))
    {
        $experienceValue = $ExperienceSalariesModel->getExpVal($userID);
    }
    else
    {
        $experienceValue = 0;
    }
    
    $WorkersHoursSalary = new WorkersHoursSalaryModel;
    $package = $WorkersHoursSalary->getRoleIDData($User->GetRoleID($userID));
    $SalariesPaymentModel = new SalariesPaymentModel;
    $attendance = new AttendanceModel();
    $checkInDate = $attendance->getCheckInDate(); 
    $Difference= strtotime($dateWithTime)-strtotime($checkInDate);
    echo $dateWithTime;
    echo "<br/>checkin date ".$checkInDate;
    echo "<br>sabta".$Difference;
    $Difference = $Difference/60;
    echo "<br/>sabta/60 ".$Difference;
    $DifferenceHr = $Difference/60;
    echo "<br/>sabta/60/60 ".$DifferenceHr;
    $value = 0;
    $ifDeduct = $package->NormalHours - $DifferenceHr * $package->DeductionHour;
    $ifDeduct = $ifDeduct * $package->DeductionHour;
    echo "<br>ifdeduct = ".$ifDeduct."<br>";
    if($DifferenceHr == $package->NormalHours)
        $value = $DifferenceHr * $package->BasicHour;
    else
    {
        $value = $DifferenceHr * $package->BasicHour;
        $value = $value + $ifDeduct;
    }
    $attendanceID = $attendance->showAttendanceByDateAndID($date, $userID);
    $oldVal = $SalariesPaymentModel->getValue($userID);
    echo "<br>".$oldVal."<br>";
    echo $oldVal+$value;
    if ($attendanceID != null){
        $leaving = new LeavingModel();
        $SalariesPaymentModel->updateValue($value+$oldVal,$userID,$checkInDate);
        $leaving->AttendanceID = $attendanceID;
        $leaving->LeaveTime = $dateWithTime;
        $leaving->Add();
    }else{
        echo "<label style='color: red'><strong>You must check in first</strong></label>";
    }

?>
