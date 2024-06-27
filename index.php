<?php
define('GAME_IDX', 213); // <------------ [GL Guide]: 변경 필
define('PAGE_TYPE', 'intro');

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/dao.php';

$csrf = rand();
$_SESSION['csrf'] = $csrf;

$dao = new DAO(GAME_IDX);

if (empty($dao->content)) {
  /* 콘텐츠 정보 없을 때, */
  Alert('잘못된 접근입니다.', '/');
  exit;
} else {
  /* 게임 차단 안 함! */
}

$shareConfig = array();
$shareConfig['title'] = $dao->content['atitle'];
$shareConfig['desc'] = $dao->content['asubtitle'];
$shareConfig['imageSquare'] = $dao->content['afile_regName3'];
$shareConfig['imagePc'] = $dao->content['afile_regName']; //kakao pc
$shareConfig['imageM'] = $dao->content['afile_regName_m']; // kakao m, facebook

/* Javascript 상수로 사용 */
$jsVar = array();
$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";
$jsVar['JS_GAME_IDX'] = "'" . GAME_IDX . "'";
$jsVar['JS_CSRF'] = "'{$_SESSION['csrf']}'";
$jsVar['JS_GAME_TITLE'] = "'{$dao->content['atitle']}'";

$jsVar['JS_SHARE_TITLE'] = "'{$shareConfig['title']}'";
$jsVar['JS_SHARE_DESC'] = "'{$shareConfig['desc']}'";
$jsVar['JS_SHARE_IMG_SQUARE'] = "'{$shareConfig['imageSquare']}'";
$jsVar['JS_SHARE_IMG_PC'] = "'{$shareConfig['imagePc']}'";
$jsVar['JS_SHARE_IMG_M'] = "'{$shareConfig['imageM']}'";

$jsVar['JS_GAME_STEP_MAX'] = 17; // <------------ [GL Guide]: 변경 필 inclue 폴더 안에 있는 mainStep php파일의 수
$jsVar['JS_GAME_LOADING'] = "'N'"; // <------------ [GL Guide]: 로딩 페이지 유무

define('PAGE_OG_TITLE', $shareConfig['title']);
define('PAGE_OG_DESC', $shareConfig['desc']);
define('PAGE_OG_IMAGE', $shareConfig['imageM']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/header.php';
?>

<header class="app-header test-header">
  <a class="app-header-btn back" href="javascript:func_goBack(JS_PAGE_TYPE, '/', JS_GAME_TITLE);" title="뒤로가기"></a>
  <a href="/" class="app-logo intro-logo real-logo">방구석연구소</a>
  <a href="javascript:void(0);" class="app-logo intro-logo dummy-logo" style="display:none;">방구석연구소</a>
</header>

<header class="app-header page header-pattern">
  <a class="app-header-btn back" href="javascript:gameActions.backStep()" title="뒤로가기"></a>
  <a href="/" class="app-logo real-logo">방구석연구소</a>
  <a href="javascript:void(0);" class="app-logo dummy-logo" style="display:none;">방구석연구소</a>
</header>

<main class="app-main">
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/dropBox.php'; ?>
  <!-- 게임 인트로 (필수) -->
  <article class="game-intro">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/gl/' . GAME_IDX . '/include/intro.php'; ?>
  </article>
  <!-- 게임 시작 -->
  <article class="game-wrap">

    <?php /* Step 파일들 ajax로 불러오기 */ ?>
  </article>
  <article class="game-loading-wrap">
    <?php /* loading 파일 ajax로 불러오기 */ ?>
  </article>
  <!-- 게임 문제페이지 하단에 있는 진행률 바 / 인트로에서 hide -->
</main>

<small>
  <?php
  // 개발 디버깅 용 영역
  // echo "<pre>" . print_r($_SESSION['game'], 1) . "<pre>";
  // echo "<pre>" . print_r($dao->quiz, 1) . "</pre>";
  ?>
</small>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/footer.php'; ?>