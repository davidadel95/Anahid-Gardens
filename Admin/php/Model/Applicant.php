<?php
class Applicant extends Event{
    
    public $ApplicantInfo;
    
    public function __construct($ApplicantInfo){
        parent::__construct();
        $this->ApplicantInfo = $ApplicantInfo;
    }
  
}