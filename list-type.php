<?php
define('GAME_IDX', 213); // <------------ [GL Guide]: 변경 필
define('PAGE_TYPE', 'list-type');

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/dao.php';

$csrf = rand();
$_SESSION['csrf'] = $csrf;

$dao = new DAO(GAME_IDX);

if (empty($dao->content)) {
  /* 콘텐츠 정보 없을 때, */
  Alert('잘못된 접근입니다.', '/');
} else {
  /* 게임 차단 안 함! */
}

/* Javascript 상수로 사용 */
$jsVar = array();
$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";
$jsVar['JS_GAME_IDX'] = "'" . GAME_IDX . "'";
$jsVar['JS_CSRF'] = "'{$_SESSION['csrf']}'";
$jsVar['JS_GAME_TITLE'] = "'{$dao->content['atitle']}'";
$jsVar['JS_SHARE_TITLE'] = "'{$dao->content['atitle']}'";
$jsVar['JS_SHARE_DESC'] = "'{$dao->content['asubtitle']}'";
$jsVar['JS_SHARE_IMG_PC'] = "'{$dao->content['afile_regName']}'";
$jsVar['JS_SHARE_IMG_M'] = "'{$dao->content['afile_regName_m']}'";
$jsVar['JS_SHARE_IMG_SQUARE'] = "'{$dao->content['afile_regName3']}'";
$listTypeConfig['listItem'] = true; // 커스텀 유형별 순위 유무
$listTypeConfig['title'] = '전체 유형 순위';
?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/header.php';
?>

<header class="app-header test-header">
  <a class="app-header-btn back" href="javascript:func_goBack(JS_PAGE_TYPE, document.referrer, JS_GAME_TITLE);" title="뒤로가기"></a>
  <a href="/" class="app-logo">방구석연구소</a>
</header>

<main class="app-main">
  <div class="result-header">투자 본능 테스트</div>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/gl/snippets/list-type.php'; ?>
</main>

<small>
  <?php
  // 개발 디버깅 용 영역
  // echo "<pre>" . print_r($_SESSION['game'], 1) . "</pre>";
  ?>
</small>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/footer.php'; ?>