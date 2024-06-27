<?php
$qNum = 1;
$buttonsConfig = array();
$buttonsConfig['question1'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
$buttonsConfig['question'] = str_replace('[1]', '<img class="question-icon" src="https://cdn.banggooso.com/assets/images/game213/question/2.png"/>', $buttonsConfig['question1']);
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/combine-template.php';
?>