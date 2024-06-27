<?php
/* INTRO 유입 카운팅 */
$dao->logging(PAGE_TYPE);

/**
 * [GL Guide]: intro 화면
 * 1. 게임 결과값에 필요한 input 데이터는 다음 값들을 필수로 한다.(gameActions.js 참고) 
 *   - name="변수명" 
 *   - data-ga="init"
 *   - data-error="메세지" --> value가 없을 경우 에러 메세지
 *   - 예시: <input type="text" name="player_name" data-ga="init" data-error="당신의 이름을 입력해주세요." placeholder="이름 입력" />
 */
?>
<div class="intro-page">
  <div class="img-title">
    <img src="<?= CDN_PATH ?>/assets/images/game207/intro/title.png" class="img-width">
  </div>

  <div class="img-intro">
    <div class="intro-avatar-box">

    </div>
  </div>

  <div class="user-nickname">

    <input type="text" id="nickname" name="nickname" data-ga="init" data-error="이름을 입력해주세요" placeholder="이름을 입력해주세요" onkeyup="validateUserNickname(this.value)" />
  </div>


  <div class="start-btn-div">
    <div class="common-btn" onClick='validateSpcCheck();'> 시작하기</div>
  </div>

  <!-- <div class="btn-wrap">
    <a href="javascript:void(0);" class="btn-game-start game-btn intro-btn">입장하기</a>
  </div> -->
  <div class="game-count">
    <div class="count-label">참여자 수</div>
    <div class="count-num"><?= $dao->content['aclicks'] ?></div>
  </div>
  <div class="preload-div" style="display:none;">
    <img src="<?= CDN_PATH ?>/assets/images/game207/background/2.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/face_03.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/face_02.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/face_06.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/top_01.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/top_02.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/top_03.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/top_07.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/pants_01.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/pants_03.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/pants_09.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/pants_07.png" />
    <img src="<?= CDN_PATH ?>/assets/imgobject/game207/items/pants_08.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/loading1.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/loading2.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/loading3.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/1.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/2.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/3.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/4.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/5.png" />
    <img src="<?= CDN_PATH ?>/assets/images/game207/loading/6.png" />
  </div>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/share-sns.php"; ?>

  <!-- 참여자 수 -->
  <!-- 조회수 10000 이상일시 노출되도록 되어있음 gameActions.js-->
  <!-- <dl class="game-count">
  <dt class="count-label">참여자 수</dt>
  <dd class="count-num"><?= $dao->content['aclicks'] ?></dd>
</dl> -->
  <script>
    var faceNum = 0;
    var topNum = 0;
    var pantsNum = 0;
    setInterval(renderCustom, 800); // 1000ms = 1초
    function renderCustom() {
      $('.intro-avatar-box').empty();
      const face = [6, 3, 2];
      const top = [1, 2, 3, 7];
      const pants = [1, 3, 9, 7, 8];

      // 배열의 길이 중 가장 긴 길이를 구합니다.

      // face 배열의 이미지 추가
      if (faceNum < face.length) {
        $('.intro-avatar-box').append(`<img class="intro-avatar" style="z-index:1"src="<?= CDN_PATH ?>/assets/imgobject/game207/items/face_0${face[faceNum]}.png" alt="아바타" />`);
      } else {
        faceNum = 0;
        $('.intro-avatar-box').append(`<img class="intro-avatar" style="z-index:1" src="<?= CDN_PATH ?>/assets/imgobject/game207/items/face_0${face[faceNum]}.png" alt="아바타" />`);
      }
      // top 배열의 이미지 추가
      if (topNum < top.length) {
        $('.intro-avatar-box').append(`<img class="intro-avatar" style="z-index:3" src="<?= CDN_PATH ?>/assets/imgobject/game207/items/top_0${top[topNum]}.png" alt="아바타" />`);
      } else {
        topNum = 0;
        $('.intro-avatar-box').append(`<img class="intro-avatar" style="z-index:3" src="<?= CDN_PATH ?>/assets/imgobject/game207/items/top_0${top[topNum]}.png" alt="아바타" />`);
      }
      // pants 배열의 이미지 추가
      if (pantsNum < pants.length) {
        $('.intro-avatar-box').append(`<img class="intro-avatar" style="z-index:2" src="<?= CDN_PATH ?>/assets/imgobject/game207/items/pants_0${pants[pantsNum]}.png" alt="아바타" />`);

      } else {

        pantsNum = 0;
        $('.intro-avatar-box').append(`<img class="intro-avatar"style="z-index:2"  style="z-index:2" src="<?= CDN_PATH ?>/assets/imgobject/game207/items/pants_0${pants[pantsNum]}.png" alt="아바타" />`);
      }
      faceNum++;
      topNum++;;
      pantsNum++;
    }



    const validateUserNickname = (_userNickname) => {
      if (_userNickname.length > 15) {
        alert('15글자 이내로 입력해주세요!');
        $('#userNickname').val(_userNickname.substr(0, 15));
        return;
      }
      return _userNickname;
    }

    function validateSpcCheck() {
      let check_spc = /[~!@#$%^&*()_+|<>?:{}]/; // 특수문자

      let nickName = $('#nickname').val();
      if (check_spc.test(nickName)) {
        alert('특수문자는 입력하실수 없습니다.');
        return false;
      }
      myAvatarGameActions.initGame();
    }
  </script>