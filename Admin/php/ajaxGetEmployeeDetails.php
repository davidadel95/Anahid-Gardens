<?php
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ExperienceSalariesModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalaryManipulationModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/WorkersHoursSalaryModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
    $employeeID = $_REQUEST["q"];
    $value = $_REQUEST["y"];
    $option = $_REQUEST["z"];
    if($employeeID != NULL && $value != NULL && $option != NULL)
    {
        if($option == "Increase Salary (/Month)")
        {
            $User = new User;
            $WorkersHoursSalaryModel = new WorkersHoursSalaryModel;
            $ExperienceSalariesModel = new ExperienceSalariesModel;
            $RoleName = new RoleNameEAV;
            $experienceValue = $ExperienceSalariesModel->getRecord($employeeID);
            $RoleID = $User->GetRoleID($employeeID);
            $package = $WorkersHoursSalaryModel->getRoleIDData($RoleID);
            if($experienceValue->Value == "NULL")
            {
                $experienceValue->Value == 0;
            }
            $packageSalaryPerMonth = $package->BasicHour * 730;
            $totalSalary = $packageSalaryPerMonth + $value + $experienceValue->Value;
            echo "<br/>Employee Name: ".$User->getUsername($employeeID);
            echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
            echo "<br/>Experience Extra Salary = ".$experienceValue->Value." LE";
            echo "<br/>Salary /Hour = ".$package->BasicHour." LE,";
            echo "<br/><br/> Package Salary /Month = ".$packageSalaryPerMonth." LE";
            echo "<br/>+<br/>Value = ".$value." LE<br/>Total Salary = ".$totalSalary." LE";
            echo "<br/>";
        }
        else if($option == "Decrease Salary (/Month)")
        {
            
        }
        
        else if($option == "Add Experience Salary")
        {
            
        }
        
    }
?>
