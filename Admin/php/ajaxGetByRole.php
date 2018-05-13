<?php

include_once "Model/CRUD.php";
include_once "dbconnect.php";
$q = $_REQUEST["q"];
$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/ExperienceSalariesModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/SalaryManipulationModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/WorkersHoursSalaryModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/RoleNameEAV.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/UserStatusModel.php";

$SalaryManipulationModel = new SalaryManipulationModel;
$WorkersHoursSalaryModel = new WorkersHoursSalaryModel;
$ExperienceSalariesModel = new ExperienceSalariesModel;
$UserStatusModel = new UserStatusModel;
$RoleName = new RoleNameEAV;
$employees = new User;
                                    
                                    $rows = $employees->SearchRole($q);
                                    echo '<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>Employee Role</th>
                                                <th>Status</th>
                                                <th>Total Salary (/Month)</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                    for($i= 0 ; $i<$rows;$i++)
                                    {   
                                        $totalSalary = 0;
                                        if($WorkersHoursSalaryModel->checkExistingRole($employees->RoleID[$i]))
                                        {
                                            
                                            $package = $WorkersHoursSalaryModel->getRoleIDData($employees->RoleID[$i]); 
                                            $packageSalaryPerMonth = $package->BasicHour * $package->NormalHours * 22;
                                            if($ExperienceSalariesModel->getExpVal($employees->ID[$i]))
                                            {
                                                $experienceValue = $ExperienceSalariesModel->getExpVal($employees->ID[$i]);
                                            }
                                            else
                                            {
                                                $experienceValue = 0;
                                            }
                                            if($SalaryManipulationModel->existing($employees->ID[$i]))
                                            {
                                                $num = 0;
                                                if($SalaryManipulationModel->isBonus == 0)
                                                {
                                                    $totalSalary = $packageSalaryPerMonth + $experienceValue + $num;
                                                    $num = -1 * abs($SalaryManipulationModel->Value);
                                                }
                                                else
                                                {   
                                                    $totalSalary = $packageSalaryPerMonth + $experienceValue - $num;
                                                    $num = $SalaryManipulationModel->Value;
                                                } 
                                            }
                                            else
                                            {
                                                $totalSalary = $packageSalaryPerMonth + $experienceValue;
                                            }
                                        }else
                                            $totalSalary = 0;
                                        
                                        
                                         
                                        
                                        echo "<tr>";
                                        echo "<th><a href=''>".$employees->ID[$i]."</a></th>";
                                        echo "<td>".$employees->getUsername($employees->ID[$i])."</td>";
                                        echo "<td>".$RoleName->GetRoleName($employees->RoleID[$i])."</td>";
                                        echo "<td>".$UserStatusModel->getStatusName($employees->Status[$i])."</td>";
                                        echo "<td>".$totalSalary." LE</td>";
                                        echo "</tr>";
                                        
                                    }
                                    echo "</tbody>";
                                        echo "</table>";

?>
