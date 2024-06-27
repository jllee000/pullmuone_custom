<div class="step2">
  <div class="dm-box">
    <div class="dm-box-padding">
      <div class="dm-pop penguin-ment">
        <div class="penguin-profile">
          <div class="profile-div"><img src="https://cdn.banggooso.com/assets/images/game207/dm/profile.png" class="penguin-img-width" /></div>
          <div>펭덕</div>
        </div>
        <span class="dm-chat-txt penguin dm-username"><?= $_SESSION['game'][$idx]['init_data']['nickname'] ?></span><br />
        <span class="dm-chat-txt penguin">나 내일 '지구식단 도시ROCK 페스티벌' 감!!!!!! <div class="chat-finger"><img class="finger-img" src="https://cdn.banggooso.com/assets/images/game207/dm/hand.png" /></div>
          <div class="chat-notice chat-notice-next-1">*TAP하여 다음 대화 이어보기</div>
        </span>

      </div>

      <div class="dm-pop dm-chat-txt me user-ment"><span class="me-txt">헐 대박</span></div>
      <div class="dm-pop penguin-ment">
        <div class="penguin-profile">
          <div class="profile-div"><img src="<?= CDN_PATH ?>/assets/images/game207/dm/profile.png" class="penguin-img-width" /></div>
          <div>펭덕</div>
        </div>
        <span class="dm-chat-txt penguin">다들 힙하고 핫하게 하고 올텐데...</span><br />
        <span class="dm-chat-txt penguin">˚✧₊⁎( ˘ω˘ )⁎⁺˳✧༚</span><br />
        <span class="dm-chat-txt penguin">나 귀여움으로 밀릴 수 없어.</span>
        <div class="chat-notice chat-notice-next">*TAP하여 다음 대화 이어보기</div>
      </div>

      <div class="dm-pop dm-chat-txt me user-ment"><span class="me-txt">ㅋㅋㅋㅋㅋㅋㅋ그건 그렇지</span></div>
      <div class="dm-pop penguin-ment">
        <div class="penguin-profile">
          <div class="profile-div"><img src="<?= CDN_PATH ?>/assets/images/game207/dm/profile.png" class="penguin-img-width" /></div>
          <div>펭덕</div>
        </div>
        <span class="dm-chat-txt penguin">나 어떻게 입고 갈지ㅎ<br />짱 귀여운 걸로 니가 좀 골라줘!</span><br />
        <span class="dm-chat-txt penguin">아 지구를 지키는 지구식단 도시락 (۶•̀ᴗ•́)۶ 도<br />맛있는 걸로 골라주라~</span>
        <div class="chat-notice chat-notice-next">*TAP하여 다음 대화 이어보기</div>
      </div>
      <div class="dm-pop dm-chat-txt me user-ment me-last"><span class="me-txt">ㅇㅋ 나만 믿어</span></div>
    </div>
  </div>
  <button id="dm-btn" class="common-btn disabled" onclick="goCustom()">
    펭꾸 시작하기
  </button>
</div>
<script>
  // step2 초기세팅
  var num = 0;
  $('#dm-btn').prop('disabled', true);
  $('.penguin-ment').eq(0).show();
  renderMessage();
  var i = 0;

  function goCustom() {
    myAvatarGameActions.nextStep()
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 인트로스토리`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `인트로스토리`,
    });
  }


  function renderMessage() {
    $('.step2').on('click tap', function() {
      if (!isClickDisabled) {

        $('.chat-notice-next-1').hide();
        $('.chat-notice').eq(num).hide();
        $('.chat-finger').eq(num).hide();


        num++;

        // 현재 채팅말풍선에 위치 고정해두기! (자동스크롤)
        $('.user-ment').eq(i).show();
        setTimeout(() => {
          $('.penguin-ment').eq(i).show();
          $('.chat-notice').eq(num).show();
          $('.dm-box').scrollTop($('.dm-box')[0].scrollHeight);
        }, 400);
        $('.dm-box').scrollTop($('.dm-box')[0].scrollHeight);
        i++;

        if (i == 3) {
          $('#dm-btn').removeClass('disabled');
          $('#dm-btn').addClass('able');
          $('#dm-btn').prop('disabled', false);
        }
      }

    });
  }
  // dm창 나올때까진 그다음 클릭 방지
  let isClickDisabled = false;
  const step2Element = document.querySelector('.step2');

  function handleClick() {
    if (isClickDisabled) return;
    isClickDisabled = true;

    setTimeout(() => {
      isClickDisabled = false;
    }, 900);
  }

  step2Element.addEventListener('click', handleClick);
</script>