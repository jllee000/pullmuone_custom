<?php
$qNum = 3;
$buttonsConfig = array();
$buttonsConfig['question3'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace('[3]', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/4.png"/>', $buttonsConfig['question3']);
?>
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>