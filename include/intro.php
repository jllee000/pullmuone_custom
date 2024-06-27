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

$shareConfig['listTitle'] = '공유하기';
?>

<!-- 이미지 -->

<div class="img-box">
  <img src="<?= CDN_PATH ?>/assets/images/game213/intro/title.png" alt="인트로 배경">
</div>

<!-- 서브타이틀 -->
<!-- <p class="game-intro-text"></p> -->
<!-- 타이틀 -->
<!-- 게임시작 버튼 (필수) -->
<div class="bottom-area">
  <div class="btn-wrap">
    <a href="javascript:argueGameActions.initGame();" class="btn-game-start game-btn">시작하기</a>
  </div>

  <!-- 참여자 수 -->
  <!-- 조회수 10000 이상일시 노출되도록 되어있음 gameActions.js-->
  <dl class="game-count">
    <dt class="count-label"><?= _t('game.participant', '참여자 수') ?></dt>
    <dd class="count-num"><?= $dao->content['aclicks'] ?></dd>
  </dl>


  <!-- 공유하기 (공용) -->
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/share-sns.php"; ?>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/most-types.php" ?>
  <div class="notice-ment">이 테스트는 단순 재미를 위해 제작된 콘텐츠입니다.</div>
  <div class="notice-ment-small">※ 투자 전 설명청취 및 상품설명서 필독<br />
    ※ 자산가격 변동 등에 따른 원금손실(0~100%)발생가능 및 투자자 귀속<br />
    ※ 한국금융투자협회심사필 제 24-02164호(2024.05.30~2024.06.30)
  </div>