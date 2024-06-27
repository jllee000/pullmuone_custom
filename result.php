<?php
define('GAME_IDX', 207); // <------------ [GL Guide]: 변경 필
define('PAGE_TYPE', 'result');

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/dao.php';

$csrf = rand();
$_SESSION['csrf'] = $csrf;

$resultCode = isset($_REQUEST['code']) ? Fn_Requestx($_REQUEST['code']) : '';

if ($resultCode == '') {
  Alert('잘못된 접근입니다!', '/gl/' . GAME_IDX . '/');
  exit();
} else {
  $dao = new DAO(GAME_IDX);

  /* 결과 데이터 불러오기 */
  $dao->loadResultData(GAME_IDX, $resultCode);
  $gameResult = $dao->result;

  if (empty($dao->result)) {
    Alert('잘못된 접근입니다!', '/gl/' . GAME_IDX . '/');
    exit();
  }
}

// var_dump(json_encode($gameResult['imgobj']));


$resultObjects = $dao->getResultObject($gameResult['imgobj']);


$data2 = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/gl/207/data/fashion.json");
$fData = json_encode($data2, true);


$foodData = array(
  "1" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/tender.png",
  ),
  "2" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/bar.png",
  ),
  "3" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/roll.png",
  ),
  "4" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/litto.png",
  ),
  "5" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/meat.png",
  ),
  "6" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/drop.png",
  ),
  "7" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/plantto.png",
  ),
  "8" => array(
    "nameimg" => "https://cdn.banggooso.com/assets/images/game207/result/hastag/mara.png",
  )
);
$foodSet = array(
  "1118" => "1",
  "1119" => "6",
  "1120" => "2",
  "1121" => "5",
  "1122" => "8",
  "1123" => "4",
  "1124" => "7",
  "1125" => "3"
);


$todoData = array(
  "1" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/4.png",
  ),
  "2" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/1.png",
  ),
  "3" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/2.png",
  ),
  "4" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/3.png",
  ),
  "5" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/5.png",
  ),
  "6" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/7.png",
  ),
  "7" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/8.png",
  ),
  "8" => array(
    "todo" => "https://cdn.banggooso.com/assets/images/game207/result/todo/6.png",
  )
);


$guideData = array(
  "1" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/4.png",
  ),
  "2" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/2.png",
  ),
  "3" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/3.png",
  ),
  "4" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/1.png",
  ),
  "5" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/5.png",
  ),
  "6" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/6.png",
  ),
  "7" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/7.png",
  ),
  "8" => array(
    "guide" => "https://cdn.banggooso.com/assets/images/game207/result/guide/8.png",
  )
);

$fationData = array(
  "1100_1109" => "완벽한 Y2K! 혹시 몇 년생이세요~?",
  "1101_1110" => "하늘하늘한 당신의 모습, 심쿵-!",
  "1102_1111" => "후드를 뒤집어쓴 당신은 신비주의~?",
  "1103_1112" => "락페를 향한 마음 표현! 강렬하다!",
  "1104_1113" => "가죽의 기세! 패션은 역시 기세죠!",
  "1105_1114" => "하이틴 주인공은 따 놓은 당상이네요~",
  "1106_1115" => "영혼까지 공주님 안전히 모시겠습니다!",
  "1107_1116" => "이 세상 아갓쉬를 쟁취할 만점 집사.",
  "1108_1117" => "자연도 감동할 아름다운 물아일체!"
);

/* 공유이미지 */
$shareConfig = [];
$shareConfig['title'] = $dao->content['atitle']; // <------------ [GL Guide]: 변경 필
$shareConfig['desc'] = '너 닮은 펭귄으로 꾸며봤음 볼래?ㅎ';
$shareConfig['imageSquare'] = $dao->content['afile_regName3'];
$shareConfig['imagePc'] = $dao->content['afile_regName']; //kakao pc
$shareConfig['imageM'] = $dao->content['afile_regName_m']; // kakao m, facebook
$shareConfig['listTitle'] = '생각나는 친구한테 공유하기';
define('PAGE_OG_TITLE', $shareConfig['title']);
define('PAGE_OG_DESC', '너 닮은 펭귄으로 꾸며봤음 볼래?ㅎ');
define('PAGE_OG_IMAGE', $shareConfig['imageM']);


/* Javascript 상수로 사용 */
$jsVar = [];
$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";
$jsVar['JS_CSRF'] = "'{$_SESSION['csrf']}'";
$jsVar['JS_GAME_IDX'] = "'" . GAME_IDX . "'";
$jsVar['JS_GAME_TITLE'] = "'{$dao->content['atitle']}'";

$jsVar['JS_SHARE_TITLE'] = "'{$shareConfig['title']}'";
$jsVar['JS_SHARE_DESC'] = "'너 닮은 펭귄으로 꾸며봤음 볼래?ㅎ'";
$jsVar['JS_SHARE_IMG_SQUARE'] = "'{$shareConfig['imageSquare']}'";
$jsVar['JS_SHARE_IMG_PC'] = "'{$shareConfig['imagePc']}'";
$jsVar['JS_SHARE_IMG_M'] = "'{$shareConfig['imageM']}'";

$jsVar['JS_IMG_OBJECT_RESULT'] = json_encode($resultObjects); // 결과 페이지 이미지 합성에서 사용됨
$jsVar['JS_GA_ID'] = "'G-K6MGZ7PYCN'";

// $popupConfig['app-open-message'] = str_replace("[]", "<br />", _t('common.pop_app_down_relation_btn', '방구석연구소 앱에서[]환상의 케미를[]확인할 수 있어!'));
// $popupConfig['app-open-path'] = $_SERVER['REQUEST_URI'];

$restartButtonText = '다시하기';

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/header.php';

?>

<header class="app-header test-header  result  result-header">
  <a class="app-header-btn back" href="#" onclick="func_goBack(JS_PAGE_TYPE, '/gl/' + JS_GAME_IDX + '/', JS_GAME_TITLE)" title="뒤로가기"></a>
  <a href="/" class="app-logo header-logo result-logo">방구석연구소</a>
</header>

<main class="app-main app-result">
  <article class="game-result">


    <div class="result-second-header">펭덕이 꾸미기</div>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/result/capture-area.php"; ?>
    <div class="result-main-size">

      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/result/resulttop.php"; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/result/resultguide.php"; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/result/resultevent.php"; ?>
      <!-- 테스트 다시하기 -->
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/gl/' . GAME_IDX . '/include/restart-button.php'; ?>

      <div class="padding-result">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/contents-more.php"; ?>
        <!-- 추천 컨텐츠 -->
        <div class="recommend-container">
          <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/recommend-content.php"; ?>
        </div>
      </div>
    </div>
    <script>
      $(function() {
        // 결과에 레이어 확인 후 디폴트 강제입히기
        containResultDefault();
        html2canvas(document.querySelector("#custom-capture"), {
          scrollX: -window.scrollX,
          scrollY: -window.scrollY,
          windowWidth: document.documentElement.offsetWidth,
          windowHeight: document.documentElement.offsetHeight
        }).then(function(canvas) {
          $('#append-area').empty().append(
            $('<img/>')
            .attr('style', '-webkit-touch-callout: default !important;z-index:999')
            .attr('src', canvas.toDataURL('image/png'))
          );
          $('.append-area-hide').css('visibility', 'visible');
        });
      });

      function restartWithGtag() {
        func_handleEventGtag({
          _title: `${JS_GAME_TITLE} - 다시 하기`,
          _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
          _label: `다시 하기 버튼`,
        });
        argueGameActions.restartTest();
      }
    </script>
    <!-- 테스트 다시하기 -->

    <!-- 추천 컨텐츠 현재 테스트만 추천 예외처리 (TODO : 기능 추가 필요)-->

    <script>
      $('.btn-wrap a').text('다른 콘텐츠 하러 가기');
      $('.contents-list .game-btn').eq(0).text('인스타그램 보러가기');

      function moveToLink() {
        gameActions.moveToBannerLink('https://bit.ly/3Pzungi');
      }

      $(window).on("load", function() {
        setTimeout(() => {
          myAvatarGameActions.avatarCapture();
          $("#capture").show();
        }, 50);
      });
    </script>
  </article>
</main>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/gl/layout/footer.php"; ?>