<?php $dao->loadGuestData(); ?>
<?php
$guestArray = $dao->guests;
?>
<div class="dropBoxBottom">
  <div class="pos-rel">
    <div class="dropbox">
      <div class="dropbox-txt dropbox-title ">나이를 선택해주세요</div>
      <div class="dropbox-scroll-zone">
        <div class="dropbox-txt dropbox-select" id="10대">
          10대
        </div>
        <div class="dropbox-txt dropbox-select" id="20대">
          20대
        </div>
        <div class="dropbox-txt dropbox-select" id="30대">
          30대
        </div>
        <div class="dropbox-txt dropbox-select" id="40대">
          40대
        </div>
        <div class="dropbox-txt dropbox-select" id="50대">
          50대
        </div>
        <div class="dropbox-txt dropbox-select" id="60대">
          60대 이상
        </div>
      </div>
    </div>
  </div>
</div>