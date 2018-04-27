
   <?php
                $q = $_REQUEST["q"];

                require_once "includes.php";
                 
             $User = new User;
                $result = $User->Search($q);
                $i=-1;
                while($row =mysqli_fetch_array($result)){
                $i++;
                $i++;
                echo "<tr>
                <th scope='row'>".$i."</th>";
                $i--;
                echo "<td>".$row['Value']."</td>
                <td>".$row['Name']."</td>
                <td>".$row['DateAdded']."</td>";
                if(strcmp($row['Status'],"Missing Login")== 0)
                    echo "<td><button class='btn btn-dark' type='button' onclick='shaf3y(".$row['id'].")' name='Formbtn'>".$row['Status'].
                    "</button>";
                    else echo "<td>".$row['Status']."</td>";
                echo "<td><button class='btn btn-success' type='button' onclick='shaf3y2(".$row['id'].")' name='Formbtn'>Edit User</button>";

            }

                  ?>
