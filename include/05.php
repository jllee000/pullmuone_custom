<?php
$qNum = 5;
$buttonsConfig = array();
$buttonsConfig['question5'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[5-1]', '[5-2]'], ['<br/>', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/13.png"/>', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/6.png"/>'], $buttonsConfig['question5']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>