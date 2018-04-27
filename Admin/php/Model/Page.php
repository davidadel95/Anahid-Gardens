<?php


/**
 *
 */
class Page implements CRUD
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @var void
     */
    public $ID;

    /**
     * @var void
     */
    public $name;

    /**
     * @var void
     */
    public $URL;

    /**
     * @var void
     */
    public $Word;

    public $Names;

    public $URLS;



    /**
     * @inheritDoc
     */
    public function Add()
    {
        // TODO: implement here
    }

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
       $db = dbconnect::getInstance();
      $mysqli = $db->getConnection();
       $sql_query = "SELECT * FROM Pages";
      $result = $mysqli->query($sql_query);


        $i=-1;
      while($row =mysqli_fetch_array($result)){
        $i++;
        $this->Names[$i]=$row["Name"];
        $this->URLS[$i]=$row["URL"];
      }
      return $i;
    }

    public function GetID($name)
    {
      $db= new dbconnect;
      $db->connect();
      $sql= "SELECT * FROM Pages where Name='$name'" ;
      $result=$db->executesql($sql);
        $i=-1;
      while($row =mysqli_fetch_array($result)){

        $ID=$row["ID"];
      }
      return $ID;
    }

    /**
     * @inheritDoc
     */
    public function Delete()
    {
        // TODO: implement here
    }



}
