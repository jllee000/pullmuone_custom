<?php
define('GAME_IDX', 213); // <------------ [GL Guide]: 변경 필
define('PAGE_TYPE', 'result');

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/dao.php';

$csrf = rand();
$_SESSION['csrf'] = $csrf;

$resultCode = isset($_REQUEST['code']) ? Fn_Requestx($_REQUEST['code']) : '';
$resultScore = isset($_REQUEST['score']) ? Fn_Requestx($_REQUEST['score']) : '';


if ($resultCode == '' && $resultScore == '') {
  Alert('잘못된 접근입니다!', '/gl/' . GAME_IDX . '/');
  exit();
} else {
  $dao = new DAO(GAME_IDX);
  if ($resultScore == '') {
    /* 결과 데이터 불러오기 */
    $dao->loadResultData(GAME_IDX, $resultCode);
    if (empty($dao->result)) {
      Alert('잘못된 접근입니다!', '/gl/' . GAME_IDX . '/');
      exit();
    }
    /* resultScore 할당 */
    $resultScore = $dao->result['score'];
  }
}
/* 결과 score 데이터 불러오기 */
$dao->loadScoreData();
$currentResultData = $dao->questionResult[$resultScore];

/* 결과 상세 타이틀 */
$resultTitleConfig = array();
$resultTitleConfig['allowDownImg'] = true;
$resultTitleConfig['descTitle'] = "<p>" . str_replace('[]', '</p><p>', $currentResultData['descTitle']) . "</p>";


/* 결과 제목 가져오기 */
$resultTitle = str_replace('[]', ' ', $currentResultData['title']);
$resultTitleConfig['imgSaveText'] = '👆&nbsp;꾹 눌러서 저장하기';
/* 공유이미지 */
$shareConfig = [];
$shareConfig['title'] = "나의 투자 본능은 " . $resultTitle; // <------------ [GL Guide]: 변경 필
$shareConfig['desc'] = $dao->content['atitle'];
$shareConfig['imageSquare'] = $dao->questionResult[$resultScore]['shareSquareImg'];
$shareConfig['imagePc'] = $dao->questionResult[$resultScore]['sharePcImg']; //kakao pc
$shareConfig['imageM'] = $dao->questionResult[$resultScore]['shareMImg']; // kakao m, facebook
$guestName = isset($dao->result['guest']) ? $dao->result['guest']['gname'] : '';

// GUEST 별 답변 비율 list 조회
$guestSelectedCntList = $dao->getArgueGuestCount('', array('g_num' => 'asc'));
$questionSelectedCntList = $dao->getQuestionCount();

define('PAGE_OG_TITLE', $shareConfig['title']);
define('PAGE_OG_DESC', $shareConfig['desc']);
define('PAGE_OG_IMAGE', $shareConfig['imageM']);
/* Javascript 상수로 사용 */
$jsVar = [];
$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";
$jsVar['JS_CSRF'] = "'{$_SESSION['csrf']}'";
$jsVar['JS_GAME_IDX'] = "'" . GAME_IDX . "'";
$jsVar['JS_GAME_TITLE'] = "'{$dao->content['atitle']}'";
$jsVar['JS_SHARE_TITLE'] = "'{$shareConfig['title']}'";
$jsVar['JS_SHARE_DESC'] = "'{$shareConfig['desc']}'";
$jsVar['JS_SHARE_IMG_SQUARE'] = "'{$shareConfig['imageSquare']}'";
$jsVar['JS_SHARE_IMG_PC'] = "'{$shareConfig['imagePc']}'";
$jsVar['JS_SHARE_IMG_M'] = "'{$shareConfig['imageM']}'";

$listTypeConfig['listItem'] = true; // 커스텀 유형별 순위 유무
// 유형별 퍼센트 가져오기
$mostContents = $dao->getMostContents(false);

// echo json_encode($test, true);
$resultStats = array();

foreach ($mostContents as $i => $mc) {
  $mcResult = $mc['aresult'];
  $precent = str_replace('%', '', $mc['Percentage']);
  $resultStats[$mcResult] = $precent;
}

/* 차트 결과값 */
$filepath = $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/results/chartConfig.json";
if (file_exists($filepath)) {
  $jsonArr = json_decode(file_get_contents($filepath), true);
  $circleChartConfig = isset($jsonArr[$resultScore]) ? $jsonArr : array();
} else {
  $circleChartConfig = array();
}

/* popup 설정 */
$popupConfig = array();
$popupConfig['most-type-link'] = 'ranking';
$popupConfig['list'] = array(
  0 => 'most-type'
);

$popupConfig['app-open-message'] = str_replace("[]", "<br />", _t('common.pop_app_down_relation_btn', '방구석연구소 앱에서[]환상의 케미를[]확인할 수 있어!'));
$popupConfig['app-open-path'] = $_SERVER['REQUEST_URI'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/header.php';

function getGuestCntTot($_data = array())
{

  $totData = 0;
  if (count($_data) > 0) {
    foreach ($_data as $avalue) {
      $totData += $avalue['s_cnt'];
    }
  }

  return $totData;
}

$shareConfig['listTitle'] = '내 결과 공유하기';

?>

<header class="app-header result">
  <a class="app-header-btn back" href="#" onclick="func_goBack(JS_PAGE_TYPE, '/gl/' + JS_GAME_IDX + '/', JS_GAME_TITLE)" title="뒤로가기"></a>
  <a href="/" class="app-logo header-logo real-logo">방구석연구소</a>
  <a href="javascript:void(0);" class="app-logo header-logo dummy-logo" style="display:none;">방구석연구소</a>
</header>
<div class="result-header">투자 본능 테스트</div>

<main class="app-main">
  <article class="game-result <?= $resultScore ?>">
    <!-- 결과페이지 메인-->
    <?php
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/results/{$resultScore}.php";
    if (file_exists($filename)) {
      include_once $filename;
    }
    ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/213/include/results/resultTop.php"; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/213/include/results/resultMid.php"; ?>
    <div class="result-padding-area">
      <!-- 공유하기 (공용) -->
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/share-sns.php"; ?>
      <!-- good, bad 관계-->
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/213/include/couple.php"; ?>

    </div>
    <div>
      <div class="result-toggle-hide" onclick="toggleHide()">
        <div>전체 궁합 한 눈에 펼쳐보기</div>
        <div class="svg-toggle"><svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.49971 8.5477C7.33902 8.5477 7.18946 8.52205 7.05101 8.47076C6.91254 8.41948 6.78092 8.33144 6.65614 8.20666L0.663844 2.21436C0.479222 2.02976 0.384777 1.79772 0.380511 1.51823C0.376222 1.23874 0.470666 1.00242 0.663844 0.809263C0.857 0.616108 1.09118 0.519531 1.36638 0.519531C1.64158 0.519531 1.87575 0.616108 2.06891 0.809263L7.49971 6.24006L12.9305 0.809263C13.1151 0.624663 13.3472 0.530219 13.6266 0.52593C13.9061 0.521663 14.1424 0.616108 14.3356 0.809263C14.5288 1.00242 14.6253 1.23661 14.6253 1.51183C14.6253 1.78703 14.5288 2.02121 14.3356 2.21436L8.34328 8.20666C8.2185 8.33144 8.08688 8.41948 7.94841 8.47076C7.80997 8.52205 7.6604 8.5477 7.49971 8.5477Z" fill="#F58220" />
          </svg>
        </div>
      </div>
      <div class="result-hide-chart"><img src="https://cdn.banggooso.com/assets/images/game213/result/couple2.png" class="img-width" /></div>
    </div>
    <div class="border-area">
      <!-- 가장 많은 유형 -->
      <div class="game-result-bottom-btn-wrapper myrank-btn">
        <a href="javascript:gameActions.moveToTypeRank()" oncontextmenu="return false">
          <button class="common-btn">내 유형 순위 보러 가기</button></a>
      </div>
      <!-- 테스트 다시하기 -->
      <div class="game-result-bottom-btn-wrapper retest-btn">
        <a href="javascript:gameActions.restartTest();">
          <button class="common-btn restart-btn">
            <div>다시 하기</div>
            <div class="restart-btn-img"><img class="img-width" src="<?= CDN_PATH ?>/assets/images/game210/icon/replay.png" alt="image"></div>
          </button></a>
      </div>
    </div>
    <!-- 컨텐츠 보러가기 -->
    <div class="more-contents-213">
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/contentsMore.php"; ?>
    </div>
    <!-- 추천 컨텐츠 -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/recommend-content.php"; ?>
    <div class="bottom-color"></div>
  </article>
</main>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/gl/layout/footer.php"; ?>

<script>
  let hideState = 1;
  $('.contents-list .game-btn').eq(0).text('인스타그램 보러가기');

  $(function() {

    $('.result-toggle-hide').on('touchend', () => {
      $(this).css('background', '#BDBDBD');
    });
    $('.result-toggle-hide').on('mouseup', () => {
      $(this).css('background', ' #BDBDBD');
    });
  });

  function toggleHide() {
    if (hideState) {
      $('.result-hide-chart').show();
      $('.svg-toggle').empty();
      $('.svg-toggle').append(`<svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7.50664 0.518709C7.66733 0.518709 7.81689 0.544352 7.95534 0.595642C8.0938 0.64693 8.22543 0.734963 8.3502 0.859741L14.3425 6.85204C14.5271 7.03664 14.6216 7.26869 14.6258 7.54817C14.6301 7.82766 14.5357 8.06399 14.3425 8.25714C14.1493 8.4503 13.9152 8.54687 13.64 8.54687C13.3648 8.54687 13.1306 8.4503 12.9374 8.25714L7.50664 2.82634L2.07584 8.25714C1.89124 8.44174 1.65919 8.53619 1.3797 8.54048C1.10024 8.54474 0.863927 8.4503 0.670771 8.25714C0.477593 8.06399 0.381004 7.8298 0.381004 7.55457C0.381004 7.27937 0.477594 7.0452 0.670771 6.85204L6.66307 0.859741C6.78785 0.734963 6.91947 0.64693 7.05794 0.595641C7.19638 0.544352 7.34595 0.518709 7.50664 0.518709Z" fill="#F58220" />
            </svg>`);
      hideState = 0;
    } else {
      $('.result-hide-chart').hide();
      $('.svg-toggle').empty();
      $('.svg-toggle').append(`<svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.49971 8.5477C7.33902 8.5477 7.18946 8.52205 7.05101 8.47076C6.91254 8.41948 6.78092 8.33144 6.65614 8.20666L0.663844 2.21436C0.479222 2.02976 0.384777 1.79772 0.380511 1.51823C0.376222 1.23874 0.470666 1.00242 0.663844 0.809263C0.857 0.616108 1.09118 0.519531 1.36638 0.519531C1.64158 0.519531 1.87575 0.616108 2.06891 0.809263L7.49971 6.24006L12.9305 0.809263C13.1151 0.624663 13.3472 0.530219 13.6266 0.52593C13.9061 0.521663 14.1424 0.616108 14.3356 0.809263C14.5288 1.00242 14.6253 1.23661 14.6253 1.51183C14.6253 1.78703 14.5288 2.02121 14.3356 2.21436L8.34328 8.20666C8.2185 8.33144 8.08688 8.41948 7.94841 8.47076C7.80997 8.52205 7.6604 8.5477 7.49971 8.5477Z" fill="#F58220"/>
      </svg>`);
      hideState = 1;
    }

  }


  var swiper = new Swiper(".slide-container-wrapper > .slide-container", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>