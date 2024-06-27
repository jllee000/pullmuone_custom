<?php
$qNum = 10;
$buttonsConfig = array();
$buttonsConfig['question10'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[10]'], ['<br/>',  '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/11.png"/>'], $buttonsConfig['question10']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>