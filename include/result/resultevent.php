<div class="result-event">
  <!-- <div class="result-event-box">
    <div>
      <img class="img-width" src="<?= CDN_PATH ?>/assets/images/game207/result/event5.png" />
    </div>
    <div class="result-btn-div hash-wrap">
      <a data-toggle="sns-share" onclick="gameActions.copyHash('풀무원 지구식단 - ')" data-service="link" data-url='#펭덕이꾸미기 #풀무원더랜드 #풀무원지구식단' class="hastag_copy  common-btn result-btn">
        <div>해시태그 복사하기 </div>
        <div class="hastag-img-copy"><img class="img-width" src="<?= CDN_PATH ?>/assets/images/game207/result/copy.png" />
        </div>
      </a>
    </div>
    <div>
      <img class="img-width" src="<?= CDN_PATH ?>/assets/images/game207/result/event2.png" />
    </div>
   
 
  </div> -->
  <div class="result-youtube-box">
    <div class="result-penguin-pop"><img class="img-width" src="<?= CDN_PATH ?>/assets/images/game207/result/pop.png" /></div>
    <div class="result-video">
      <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ICxFqFm6iIw?si=8oPLVDlhEGubOjEH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="land-btn-div land-youtube-div">
      <a href="https://bit.ly/4ayYZqS">
        <div class="common-btn go-land-btn" onclick="goSite();">
          풀무원지구식단 맛보러가기
        </div>
      </a>

    </div>
    <div class="go-land-btn-div land-youtube-div">
      <a href="https://www.instagram.com/pulmuwonderland/?utm_source=landing1&utm_medium=organic_social&utm_campaign=pengduk_custom&utm_id=banggooso&utm_content=0329_landing1">
        <div class="common-btn go-land-btn2" onclick="goLand();">
          풀무원더랜드 놀러가기
        </div>
      </a>
    </div>

  </div>

</div>
<div class="share-result">
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/share-sns.php"; ?>
</div>
<script>
  // 버튼 클릭 이벤트 핸들러
  $('.list-title span').text('생각나는 친구한테 공유하기');

  function goSite() {
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 배너 클릭 - 랜딩 링크(맛보러가기)`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `- 배너 클릭 - 랜딩 링크(기획전)`,
    });
  }

  function goLand() {
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 배너 클릭 - 랜딩 링크(인스타)`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `- 배너 클릭 - 랜딩 링크(인스타)`,
    });
  }

  function hastagCopy() {
    // 복사할 문자열 정의
    const textToCopy = "#펭덕이꾸미기 #풀무원더랜드 #풀무원지구식단";
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 해시태그 복사하기`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `해시태그 복사하기 버튼`,
    });
    // 클립보드에 복사
    navigator.clipboard.writeText(textToCopy)
      .then(() => {
        alert('복사되었습니다.');
        // 성공적으로 복사되었을 때의 작업 추가 가능
      })
  }
</script>