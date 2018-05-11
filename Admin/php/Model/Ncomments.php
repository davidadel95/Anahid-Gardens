<?php
    class ncomments
{
public $subject;
public $comment;
public $status;


public function GetlatestNotifications(){
    $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $query = "SELECT * FROM ncomments ORDER BY comment_id DESC LIMIT 5";
    $result = $mysqli->query($query);
    $counter=-1;
    while($rows=mysqli_fetch_array($result)){
        $counter++;
        $this->subject[$counter]=$rows['comment_subject'];
        $this->comment[$counter]=$rows['comment_text'];  
    }
       return $counter;
    }
public function GetUnseenNotifications(){
    $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $status_query = "SELECT * FROM ncomments WHERE comment_status=0";
    $result_query = $mysqli->query($status_query);
    $count = mysqli_num_rows($result_query);
    return $count;
} 
public function Seen(){
    $db = dbconnect::getInstance();
    $mysqli = $db->getConnection();
    $update_query = "UPDATE ncomments SET comment_status = 1 WHERE comment_status=0";
    $mysqli->query($update_query);
}        
    
    }
        ?>