<?php


$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/Ncomments.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";


$Notification = new ncomments;
$counter=$Notification->GetlatestNotifications();
echo '<li class="dropdown active open">
 
      <a href="#" onclick="NotificationCloseAjax()"  data-toggle="dropdown" aria-expanded="true"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
 
   <ul class="dropdown-menu">';
         

          for($i=0;$i<=$counter;$i++){
             echo '<li><a href="ShowDoctors.php"><strong>New Applicant</strong>
             <br/>
             <small>
             <em>'.$Notification->comment[$i].' Has Applied</em>
             </small>
             </a></li>';
          }
          
         
         
        echo' </ul>
     </li>';
        
    $Notification->Seen();
			

 

?>