<?php
define('GAME_IDX', 207); // <------------ [GL Guide]: 변경 필
define('PAGE_TYPE', 'intro');

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/dao.php';

$csrf = rand();
$_SESSION['csrf'] = $csrf;

$dao = new DAO(GAME_IDX);

/* 페이지 액세스 컨트롤 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/accessControl.php';

$shareConfig = array();
$shareConfig['title'] = $dao->content['atitle'];
$shareConfig['desc'] = '내 미니미 패피 펭귄 만들러 가기!';
$shareConfig['imageSquare'] = $dao->content['afile_regName3'];
$shareConfig['imagePc'] = $dao->content['afile_regName']; //kakao pc
$shareConfig['imageM'] = $dao->content['afile_regName_m']; // kakao m, facebook
$shareConfig['listTitle'] = '공유하기';

$audioList = $dao->getAudioList();

/* Javascript 상수로 사용 */
$jsVar = array();
$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";
$jsVar['JS_GAME_IDX'] = "'" . GAME_IDX . "'";
$jsVar['JS_CSRF'] = "'{$_SESSION['csrf']}'";
$jsVar['JS_GAME_TITLE'] = "'{$dao->content['atitle']}'";

$jsVar['JS_SHARE_TITLE'] = "'{$shareConfig['title']}'";
$jsVar['JS_SHARE_DESC'] = "'내 미니미 패피 펭귄 만들러 가기!'";
$jsVar['JS_SHARE_IMG_SQUARE'] = "'{$shareConfig['imageSquare']}'";
$jsVar['JS_SHARE_IMG_PC'] = "'{$shareConfig['imagePc']}'";
$jsVar['JS_SHARE_IMG_M'] = "'{$shareConfig['imageM']}'";

$jsVar['JS_GAME_STEP_MAX'] = 3; // <------------ [GL Guide]: 변경 필 inclue 폴더 안에 있는 mainStep php파일의 수
$jsVar['JS_GAME_LOADING'] = "'Y'"; // <------------ [GL Guide]: 로딩 페이지 유무
$jsVar['JS_AUDIO_LIST'] = json_encode($audioList);

$jsVar['JS_GA_ID'] = "'G-K6MGZ7PYCN'";
/* 
테스트가 게시상태가 아닐 때 외부페이지로 넘어가지 못하도록 하기 위해 astatus 받아옴
astatus 0: 보류, 1: 게시, 2: 테스트 
index.php, result.php, list-type.php, intro.php에서 각각 사용 
*/
$astatus = $dao->content['astatus'];
?>

<?php
// $gameBodyBackgroundStyle = "#000000";
require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/header.php';
?>
<header class="app-header test-header intro-header">
  <a class="app-header-btn back" href="javascript:func_goBack(JS_PAGE_TYPE, '/', JS_GAME_TITLE);" title="뒤로가기"></a>
  <a href="/" class="app-logo">방구석연구소</a>
</header>

<header class="app-header page">
  <a class="app-header-btn back" onclick="func_goBack(JS_PAGE_TYPE, '/gl/' + JS_GAME_IDX + '/', JS_GAME_TITLE)" title="뒤로가기" title="뒤로가기"></a>
  <a href="/" class="app-logo">방구석연구소</a>
  <a href="/" class="app-home"></a>
</header>

<main class="app-main">
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
</main>

<small>
  <?php
  // 개발 디버깅 용 영역
  //echo "<pre>" . print_r($_SESSION['game'], 1) . "<pre>";
  // echo "<pre>" . print_r($dao->quiz, 1) . "</pre>";
  ?>
</small>
<script>

</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/footer.php'; ?>