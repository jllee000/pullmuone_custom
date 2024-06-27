<?php $dao->loadGuestData();
$guestArray = $dao->guests; ?>
<div class="survey-area">
  <div class="loading-title">내 투자 본능 측정 중...</div>
  <div class="loading-txt">아래 정보를 입력하면<br />내 결과가 정확하게 측정돼요!</div>
  <div class="survey-box">
    <div class="survey-select-box">
      <div class="survey-title">나이</div>
      <div>
        <div class="survey-age-select">
          <div id="age-box" name="age-box" required>나이 선택</div>
          <div>
            <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.99973 9.85515C8.803 9.85515 8.61857 9.82437 8.44643 9.76281C8.27429 9.70125 8.11444 9.5966 7.9669 9.44885L1.17968 2.65249C0.909178 2.38162 0.773926 2.03688 0.773926 1.61827C0.773926 1.19965 0.909178 0.854907 1.17968 0.584038C1.45019 0.313169 1.79447 0.177734 2.21252 0.177734C2.63057 0.177734 2.97485 0.313169 3.24536 0.584038L8.99973 6.34617L14.7541 0.584038C15.0246 0.313169 15.3689 0.177734 15.7869 0.177734C16.205 0.177734 16.5493 0.313169 16.8198 0.584038C17.0903 0.854907 17.2255 1.19965 17.2255 1.61827C17.2255 2.03688 17.0903 2.38162 16.8198 2.65249L10.0326 9.44885C9.88502 9.5966 9.72518 9.70125 9.55304 9.76281C9.3809 9.82437 9.19646 9.85515 8.99973 9.85515Z" fill="#333333" />
            </svg>
          </div>
        </div>
        <!-- <select class="survey-age-select" id="age" onclick="openDropbox();">
          <option value="default">나이 선택</option>
          <option value="age-10" id="option-age-10">10대</option>
          <option value="age-20" id="option-age-20">20대</option>
          <option value="age-30" id="option-age-30">30대</option>
          <option value="age-40" id="option-age-40">40대</option>
          <option value="age-50" id="option-age-50">50대</option>
          <option value="age-60" id="option-age-60">60대 이상</option>
        </select> -->
      </div>
    </div>
    <div class="survey-select-box">
      <div class="survey-title">성별</div>
      <div class="survey-sex-area">
        <div class="survey-sex-box">
          <div class="survey-sex-txt">
            남성
          </div>
          <div class="survey-sex-select">
            <label for="agreeCheckbox" class="sign-label">
              <input type="checkbox" id="manCheckbox" />
              <i class=" form-checkbox circle"></i>
            </label>
          </div>
          <!-- <input type="radio" name="gender" value="man"> -->
        </div>
        <div class="survey-sex-box">
          <div class="survey-sex-txt">
            여성
          </div>
          <div class="survey-sex-select">
            <label for="agreeCheckbox" class="sign-label">
              <input type="checkbox" id="womanCheckbox" />
              <i class=" form-checkbox circle"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="survey-btn-div">
    <button class="survey-btn" onclick="goMyResult()">결과 확인하기</button>
  </div>

</div>
<script>
  var $ageId = "";
  var $sexId = "";

  function goMyResult() {
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 결과 확인하기`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `${JS_GAME_TITLE} - 결과 확인하기`,
    });
  }

  function updateButtonState() {
    if ($ageId && $sexId) {
      $('.survey-btn').prop('disabled', false).css('background-color', '#f58220');
    } else {
      $('.survey-btn').prop('disabled', true).css('background-color', '');
    }
  }

  $('.dropbox-select').click(function() {
    $('#age').prop('disabled', false);
    $ageId = $(this).attr('id');
    $('#age-box').css('color', 'rgba(51, 51, 51, 1)')
    $('#age-box').text($ageId);
    $('.dropBoxBottom').hide();
    $('.survey-age-select').css('border-bottom', '2px solid rgb(51, 51, 51)');
    updateButtonState();
  });
  $('.dropBoxBottom').click(function() {
    $('.dropBoxBottom').hide();
    $('#age').prop('disabled', false);
  });
  $('.survey-age-select').click(function() {
    $('.dropBoxBottom').show();
  });

  function openDropbox() {
    $('.dropBoxBottom').show();
    $('#age').prop('disabled', true);
  }
  $('.survey-sex-box').click(function() {
    $('.survey-sex-box').css('backgroundColor', 'rgba(245, 246, 248, 1)');
    $('.survey-sex-box').css('color', 'rgba(51, 51, 51, 0.5)');
    $(this).css('backgroundColor', '#f58220');
    $(this).css('color', 'white');
    $('#manCheckbox').prop('checked', false);
    $('#womanCheckbox').prop('checked', false);
    var $input = $(this).find('input[type="checkbox"]');
    $sexId = $input.attr('id');
    $input.prop('checked', true);
    updateButtonState();
  });

  $('.survey-btn').click(function() {
    if ($sexId == "manCheckbox" && $ageId == "10대") {
      argueGameActions.selectGuest(1);
    } else if ($sexId == "manCheckbox" && $ageId == "20대") {
      argueGameActions.selectGuest(2);
    } else if ($sexId == "manCheckbox" && $ageId == "30대") {
      argueGameActions.selectGuest(3);
    } else if ($sexId == "manCheckbox" && $ageId == "40대") {
      argueGameActions.selectGuest(4);
    } else if ($sexId == "manCheckbox" && $ageId == "50대") {
      argueGameActions.selectGuest(5);
    } else if ($sexId == "manCheckbox" && $ageId == "60대") {
      argueGameActions.selectGuest(6);
    } else if ($sexId == "womanCheckbox" && $ageId == "10대") {
      argueGameActions.selectGuest(7);
    } else if ($sexId == "womanCheckbox" && $ageId == "20대") {
      argueGameActions.selectGuest(8);
    } else if ($sexId == "womanCheckbox" && $ageId == "30대") {
      argueGameActions.selectGuest(9);
    } else if ($sexId == "womanCheckbox" && $ageId == "40대") {
      argueGameActions.selectGuest(10);
    } else if ($sexId == "womanCheckbox" && $ageId == "50대") {
      argueGameActions.selectGuest(11);
    } else if ($sexId == "womanCheckbox" && $ageId == "60대") {
      argueGameActions.selectGuest(12);
    }

    argueGameActions.nextStep();
  })
</script>