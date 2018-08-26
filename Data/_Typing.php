<?php

require_once(__DIR__ . '/../DB/TypingText.php');

$typeText = new TypingText();
$texts = $typeText->getData();

header('Content-Type: application/json; charset=UTF-8');
echo json_encode([
  'typing_texts' => $texts
]);


 ?>
