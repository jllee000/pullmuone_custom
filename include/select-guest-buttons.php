<?php $dao->loadGuestData(); ?>
<div class="pop-text question-text">
  더 정확하고 재미있는<br /> 직장인 논쟁 리포트를 위해<br /> 당신의 연차를 알려 주세요!
</div>
<div class="select-area-wrapper">
  <div class="select-area">
    <?php
    foreach ($dao->guests as $guestIndex => $guestData) {
    ?>
      <div class="selections">
        <a href="javascript:argueGameActions.selectGuest(<?= $guestData['g_num'] ?>)">
          <?= str_replace('[]', '<br>', $guestData['guest_name']) ?>
        </a>
      </div>
    <? } ?>
  </div>
</div>