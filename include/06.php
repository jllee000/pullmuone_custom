<?php
$qNum = 6;
$buttonsConfig = array();
$buttonsConfig['question6'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[6]'], ['<br/>',  '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/7.png"/>'], $buttonsConfig['question6']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>