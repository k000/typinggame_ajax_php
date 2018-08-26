<?php

require_once('Base.php');

  class M_Save extends Base{


    public function saveData($data){

      $sql = $this->db->prepare("insert into ranking (score,name) values(:score,:name);");
      $sql->execute([ 'score' => $data['score'] , 'name' => $data['name'] ]);

    }

  }



 ?>
