<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CRUD.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/dbconnect.php";
class RoleAttributes implements CRUD
{
    /**
     *
     */


    /**
     * @var void
     */
    public $ID;

    /**
     * @var void
     */
    public $RoleNameEAV;

    /**
     * @var void
     */
    public $Visibilty;

    public function __construct()
    {
      $this->RoleNameEAV = new RoleNameEAV;
    }


    /**
     * @inheritDoc
     */
    public function Add()
    {
      $db= new dbconnect;
      $db->connect();
      $RoleNameEAV = new RoleNameEAV;
      $Visibilty= new Visibilty;
      $Visibilty->Attribute = new Attribute;
      $sql= "Select * From Role WHERE Name = '".$this->$RoleNameEAV->Name."'";
      $result=$db->executesql($sql);
      while($row =mysqli_fetch_array($result)){
      $this->RoleNameEAV->ID=$row["ID"];
      }

      $sql= "Select * From ApplicationOptions WHERE Name = ".$this->Visibility->Attribute->Name;
      $result=$db->executesql($sql);
      while($row =mysqli_fetch_array($result)){
      $this->Visibility->Attribute->ID=$row["ID"];
      }

$this->Visibilty->IsVisible=TRUE;
      $sql= "INSERT INTO application(ID,RoleID,ApplicationOptionID,IsVisible) VALUES ('','".$this->RoleNameEAV->ID."','".$this->Visibility->Attribute->ID."','".$this->Visibilty->IsVisible."' )";
echo $sql;
      $result=$db->executesql($sql);

    }
// ('','$this->NameEAV->ID','$ID','$this->Visibilty->IsVisible' )";




    /**
     * @inheritDoc
     */
    public function Edit()
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function View()
    {
        // TODO: implement here
    }

    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }



}
