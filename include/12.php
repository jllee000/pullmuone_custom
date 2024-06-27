<?php
$qNum = 12;
$buttonsConfig = array();
$buttonsConfig['question12'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[12]'], ['<br/>',  '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/1.png"/>'], $buttonsConfig['question12']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>