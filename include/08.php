<?php
$qNum = 8;
$buttonsConfig = array();
$buttonsConfig['question8'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace(['[]', '[8-1]', '[8-2]'], ['<br/>', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/9.png"/>', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/14.png"/>'], $buttonsConfig['question8']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>