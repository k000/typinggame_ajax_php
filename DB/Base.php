<?php


require_once('../Config/config.php');

class Base{
  protected $db;

  public function __construct(){
    try{

      $this->db = new PDO(DSN,USER,PASSWORD);

    }catch(PDOException $e){

      echo $e->getMessage();

    }
  }//end construct

}



 ?>
