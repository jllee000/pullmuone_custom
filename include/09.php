<?php
$qNum = 9;
$buttonsConfig = array();
$buttonsConfig['question9'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[9]'], ['<br/>',  '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/10.png"/>'], $buttonsConfig['question9']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>