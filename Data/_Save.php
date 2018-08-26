<?php
//DBに保存する
require_once(__DIR__ . '/../DB/M_Save.php');


$do = false;
$name = "";
$save = new M_Save();

  //$name = $_POST['name']; 非推奨
  $name  = filter_input( INPUT_POST, "name",FILTER_SANITIZE_SPECIAL_CHARS );

  if($score = filter_input(INPUT_POST, "score", FILTER_SANITIZE_SPECIAL_CHARS)){
    $do = true;

    //保存処理
    $data = array('score'=>$score,'name'=>$name);
    //$data = { 'score' : $score , 'name' : $name  }


        $save->saveData($data);

  }else{
    $do = false;
  }

/*
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
  'text' => $do
]);
*/

 ?>
