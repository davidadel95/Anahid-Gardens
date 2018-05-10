<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
$db = dbconnect::getInstance();
$mysqli = $db->getConnection();

if(isset($_POST['view'])){

// $con = mysqli_connect("localhost", "root", "", "notif");

if($_POST["view"] != '')
{
    $update_query = "UPDATE ncomments SET comment_status = 1 WHERE comment_status=0";
    $mysqli->query($update_query);
}
$query = "SELECT * FROM ncomments ORDER BY comment_id DESC LIMIT 5";
$result = $mysqli->query($query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
   $output .= '
   <li>
   <a href="#">
   <strong>'.$row["comment_subject"].'</strong><br />
   <small><em>'.$row["comment_text"].'</em></small>
   </a>
   </li>
   ';

 }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}



$status_query = "SELECT * FROM comments WHERE comment_status=0";
$result_query = $mysqli->query($status_query);
$count = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);

}

?>