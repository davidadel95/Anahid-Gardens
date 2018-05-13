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
        $User = new User;
            if($User->GetRoleID($employeeID))
            {
                $SalaryManipulationModel = new SalaryManipulationModel;
                $WorkersHoursSalaryModel = new WorkersHoursSalaryModel;
                $ExperienceSalariesModel = new ExperienceSalariesModel;
                $RoleName = new RoleNameEAV;
                if($ExperienceSalariesModel->getExpVal($employeeID))
                {
                    $experienceValue = $ExperienceSalariesModel->getExpVal($employeeID);
                }
                else
                {
                    $experienceValue = 0;
                }
                if($User->GetRoleID($employeeID) != 2)
                {
                    $RoleID = $User->GetRoleID($employeeID);
                    $package = $WorkersHoursSalaryModel->getRoleIDData($RoleID);  
                    $packageSalaryPerMonth = $package->BasicHour * $package->NormalHours * 22;
                    
                    if($option == "Increase Salary (/Month)")
                    {
                        if($SalaryManipulationModel->existing($employeeID))
                            {   
                                
                                if($packageSalaryPerMonth < $value )
                                {
                                    $message = "Deduction is over the current Salary!";
                                    echo $message;
                                    echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                    return;
                                }
                                echo "<div class='form-title'>Employee Information </div><br/>Employee Name: ".$User->getUsername($employeeID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                $num = 0;
                                if($SalaryManipulationModel->isBonus == 0)
                                {
                                    $totalSalary = $packageSalaryPerMonth + $value + $experienceValue + $num;
                                    $num = -1 * abs($SalaryManipulationModel->Value);
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                else
                                {   
                                    $totalSalary = $packageSalaryPerMonth + $value + $experienceValue - $num;
                                    $num = $SalaryManipulationModel->Value;
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE";
                                echo "<br/><br/> <div class='form-title'>Calculation </div> <br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >=0)
                                {
                                    echo "<br/>+<br/>".$experienceValue;
                                }
                                
                                echo " LE<br/>-<br/>".$num." LE<br/>+<br/>".$value." LE<br/><br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                        else
                            {
                                if($packageSalaryPerMonth < $value )
                                {
                                    $message = "Deduction is over the current Salary!";
                                    echo $message;
                                    echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                    return;
                                }
                                echo "<div class='form-title'>Employee Information </div><br/>Employee Name: ".$User->getUsername($employeeID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE";
                                echo "<br/><br/> <div class='form-title'>Calculation </div><br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >=0)
                                {
                                    echo "<br/>+<br/>".$experienceValue;
                                }
                                $totalSalary = $packageSalaryPerMonth + $value + $experienceValue;
                                echo " LE<br/>+<br/>".$value." LE<br/><br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                    }
                    else if($option == "Decrease Salary (/Month)")
                    {
                            $totalSalary = 0;
                            if($SalaryManipulationModel->existing($employeeID))
                            {   
                                
                                if($packageSalaryPerMonth < $value )
                                {
                                    $message = "Deduction is over the current Salary!";
                                    echo $message;
                                    echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                    return;
                                }
                                echo "<div class='form-title'>Employee Information </div><br/>Employee Name: ".$User->getUsername($employeeID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                $num = 0;
                                if($SalaryManipulationModel->isBonus == 0)
                                {
                                    $totalSalary = $packageSalaryPerMonth - $value + $experienceValue + $num;
                                    $num = -1 * abs($SalaryManipulationModel->Value);
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                else
                                {   
                                    $totalSalary = $packageSalaryPerMonth - $value + $experienceValue - $num;
                                    $num = $SalaryManipulationModel->Value;
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE";
                                echo "<br/><br/> <div class='form-title'>Calculation </div> <br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >=0)
                                {
                                    echo "<br/>+<br/>".$experienceValue;
                                }
                                echo " LE<br/>-<br/>".$num." LE<br/>-<br/>".$value." LE<br/><br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                            else
                            {
                                if($packageSalaryPerMonth < $value )
                                {
                                    $message = "Deduction is over the current Salary!";
                                    echo $message;
                                    echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                    return;
                                }
                                echo "<div class='form-title'>Employee Information </div><br/>Employee Name: ".$User->getUsername($employeeID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE";
                                echo "<br/><br/> <div class='form-title'>Calculation </div><br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >=0)
                                {
                                    echo "<br/>+<br/>".$experienceValue;
                                }
                                $totalSalary = $packageSalaryPerMonth - $value + $experienceValue;
                                echo " LE<br/>-<br/>".$value." LE<br/><br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                            
                    }

                    else if($option == "(Add/Change) Experience Salary")
                    {
                            if($SalaryManipulationModel->existing($employeeID))
                            {   
                                
                                if($packageSalaryPerMonth < $value )
                                {
                                    $message = "Deduction is over the current Salary!";
                                    echo $message;
                                    echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                    return;
                                }
                                echo "<div class='form-title'>Employee Information </div><br/>Employee Name: ".$User->getUsername($employeeID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                $num = 0;
                                if($SalaryManipulationModel->isBonus == 0)
                                {
                                    $num = -1 * abs($SalaryManipulationModel->Value);
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                else
                                {   
                                    $num = $SalaryManipulationModel->Value;
                                    echo "<br/>Manipulated Salary (/Month) = ".$num." LE";
                                }
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE";
                                echo "<br/><br/> <div class='form-title'>Calculation </div><br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >0)
                                {
                                    echo "<br/>-<br/>".$experienceValue;
                                }
                                $totalSalary = $packageSalaryPerMonth + $value - $experienceValue + $num;
                                echo " LE<br/>+<br/>".$num." LE<br/>+<br/>".$value." LE<br/><br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                            else
                            {
                                if($packageSalaryPerMonth < $value )
                                {
                                    $message = "Deduction is over the current Salary!";
                                    echo $message;
                                    echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                    return;
                                }
                                echo "<div class='form-title'>Employee Information </div><br/>Employee Name: ".$User->getUsername($employeeID);
                                echo "<br/>Employee Role: ".$RoleName->GetRoleName($RoleID);
                                echo "<br/>Salary (/Hour) = ".$package->BasicHour." LE";
                                echo "<br/>Current Salary (/Month): ".$packageSalaryPerMonth." LE";
                                echo "<br/>Experience Extra Salary = ".$experienceValue." LE,";
                                echo "<br/><br/> <div class='form-title'>Calculation </div><br/><br/> ".$packageSalaryPerMonth." LE";
                                if($experienceValue >=0)
                                {
                                    echo "<br/>-<br/>".$experienceValue;
                                }
                                $totalSalary = $packageSalaryPerMonth + $value - $experienceValue;
                                echo " LE<br/>+<br/>".$value." LE<br/><br/>Total Salary = ".$totalSalary." LE";
                                echo "<br/>";
                            }
                    }
                 }
            }
                    
    }
        
    
?>
