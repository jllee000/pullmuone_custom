<?php
$qNum = 4;
$buttonsConfig = array();
$buttonsConfig['question4'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[4-1]', '[4-2]'], ['<br/>', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/5.png"/>', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/9.png"/>'], $buttonsConfig['question4']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>