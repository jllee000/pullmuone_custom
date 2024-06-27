<?
$maxStep = 16;
?>

<section class="game-body test-step-<?= $qNum ?>">

  <div class="question-controller">
    <div class="controller-title">투자 본능 테스트</div>
    <div class="outer">
      <div class="inner"></div>
    </div>
  </div>
  <div class="question-template-area">
    <div class="question-title-flex">
      <h4 class="question-title">
        <?= str_replace('[]', '<br>', $buttonsConfig['question']); ?>
      </h4>
    </div>
    <div class="select-area">
      <?php
      foreach ($buttonsConfig['answerArr'] as $answerIndex => $answer) {
      ?>
        <a href="javascript:argueGameActions.selectArgueAnswer(<?= $qNum ?>, <?= $answerIndex ?>)">
          <?= str_replace('[]', '<br>', $buttonsConfig['answerArr'][$answerIndex]['answer']) ?>
        </a>
      <? } ?>
    </div>
  </div>
</section>
<script>
  var percent = <?= $qNum ?> * 7.69;
  console.log();
  $('.inner').css('width', `${percent}%`);
  $(function() {

    $('.select-area a').on('touchend', () => {
      $(this).css('background-color', ' #f58220');
    });
    $('.select-area a').on('mouseup', () => {
      $(this).css('background-color', ' #f58220');
    });
  });
</script>