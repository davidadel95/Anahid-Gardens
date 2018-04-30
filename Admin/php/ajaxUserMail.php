<?php

include_once "dbconnect.php";
    $q = $_REQUEST["q"];
    $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $sql = "SELECT applicationvalue.Value FROM `applicationoptions`
                INNER JOIN `application`
                ON applicationoptions.ID = application.ApplicationOptionID
                INNER JOIN `applicationvalue`
                ON application.ID= applicationvalue.ApplicationID
                where Name ='Email'
                AND applicationvalue.Value LIKE '%".$q."%'";
     $result = $mysqli->query($sql);
     while ($row=mysqli_fetch_array($result))
     {
        echo'<option>'.$row['Value'].'</option>';
     }
    
	           
  ?>

<html>
    <body>
        <script>
            
        </script>
    </body>
</html>
