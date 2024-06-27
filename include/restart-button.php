<div class="game-btn-wrapper btn_retest">
  <a class="game-btn" onclick="restartWithGtag();">
    <div class="restart-txt"> <?= isset($restartButtonText) ? $restartButtonText : _t('common.game_retest', '다시 하기') ?></div>
    <div class="replay-img">
      <img class="img-width" src="<?= CDN_PATH ?>/assets/images/game207/result/replay.png" />
    </div>

  </a>
</div>

<script>
  $('.btn_retest .restart-txt').text('다시 하기');

  function restartWithGtag() {
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 다시 하기`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `다시 하기 버튼`,
    });
    argueGameActions.restartTest();
  }
</script>