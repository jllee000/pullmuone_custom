<?php
$qNum = 7;
$buttonsConfig = array();
$buttonsConfig['question7'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[7]'], ['<br/>',  '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/8.png"/>'], $buttonsConfig['question7']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>