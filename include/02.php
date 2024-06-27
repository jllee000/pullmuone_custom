<?php
$qNum = 2;
$button2Config = array();
$buttonsConfig['question2'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace('[2]', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/3.png"/>', $buttonsConfig['question2']);
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php'; ?>