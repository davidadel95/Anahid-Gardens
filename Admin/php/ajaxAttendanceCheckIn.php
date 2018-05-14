<?php

    $userID = $_REQUEST["userID"];
//    echo $userID;
    $dateWithTime = date('Y-m-d H:i:s', time());
    $date = date('Y-m-d', time());

    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/AttendanceModel.php";
    require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";


    if ($attendanceID == null){
        $attendance = new AttendanceModel();
        $attendance->UserID = $userID;
        $attendance->Date = $dateWithTime;
        $attendance->Attended = 1;
        $attendance->Add();

        echo "
                    <table class=\"table table-hover\">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>User ID</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                      </thead>
                      <tbody>
                    ";

        $user = new User();
        $numberOfUsers = $user->showAllUsersWithoutChilds();
        $count = 1;

        for ($i = 0; $i<= $numberOfUsers; $i++){
            echo "<tr>";
            echo "<th>$count</th>";
            echo "<td>" . $user->Value[$i] . "</td>";
            echo "<td>" . $user->UserID[$i] . "</td>";
            if ($attendanceID == null){

            }else{
                echo "<td><button class='btn btn-success' type='button' onclick='checkIn(".$user->UserID[$i].")' name='Formbtn'>Check in</button></td>";
            }
            echo "<td><button class='btn btn-dark' type='button' onclick='checkOut(".$user->UserID[$i].")' name='Formbtn'>Check out</button></td>";
            echo "</tr>";
            $count++;
        }

        echo "
              </tbody>
             </table>
                        ";
    }



?>
