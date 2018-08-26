<?php

require_once('Base.php');

  class TypingText extends Base{

    public function getData(){
      $sql = $this->db->query("select text from typingtext;");
      $sql->setFetchMode(PDO::FETCH_CLASS,'stdClass');
      return $sql->fetchAll();
    }

  }



 ?>
