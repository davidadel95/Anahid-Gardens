<?php
    class Event implements \SplSubject{
        
        public $storage;
        
        public function __construct(){
            $this->storage = new \SplObjectStorage();
        }
        public function attach(\SplObserver $observer){
            $this->storage->attach($observer);
        }
        public function detach(\SplObserver $observer){
            if(!$this->storage->contains($observer))
                return;
            $this->storage->detach($observer);
        }
        public function notify(){
            if(!count($this->storage)){
                return;
            }
            foreach($this->storage as $observer){
                $observer->update($this);
            }
        }
        public function InsertEvent($subject,$comment){
             $db = dbconnect::getInstance();
            $mysqli = $db->getConnection();
            $sql_query = "INSERT INTO ncomments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
            $result = $mysqli->query($sql_query);
        }
    }



?>