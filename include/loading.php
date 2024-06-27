<?php
/*
[GL Guide]: 로딩페이지 커스텀이 필요한 경우에 사용되는 페이지

*/
?>

<div class="full-page" id="loading">
  <div class="loading-content-wrapper">
    <div class="peng-animation-wrapper">
      <img class="peng-bg peng-bg-1 animation-index-0" src="<?= CDN_PATH ?>/assets/images/game207/loading/peng-1.png" />
      <img class="peng-bg peng-bg-2 animation-index-1" src="<?= CDN_PATH ?>/assets/images/game207/loading/peng-2.png" />
      <img class="peng-bg peng-bg-3 animation-index-2" src="<?= CDN_PATH ?>/assets/images/game207/loading/peng-3.png" />
    </div>
    <div class="content-swiper-wrapper">
      <div dir=rtl class="swiper loading-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img class="loading-food-1" src="<?= CDN_PATH ?>/assets/images/game207/loading/2.png"></div>
          <div class="swiper-slide"><img class="loading-food-2" src="<?= CDN_PATH ?>/assets/images/game207/loading/3.png"></div>
          <div class="swiper-slide"><img class="loading-food-3" src="<?= CDN_PATH ?>/assets/images/game207/loading/4.png"></div>
          <div class="swiper-slide"><img class="loading-food-4" src="<?= CDN_PATH ?>/assets/images/game207/loading/5.png"></div>
          <div class="swiper-slide"><img class="loading-food-5" src="<?= CDN_PATH ?>/assets/images/game207/loading/6.png"></div>
          <div class="swiper-slide"><img class="loading-food-6" src="<?= CDN_PATH ?>/assets/images/game207/loading/1.png"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer loading-btn-box">
    <button class="loading-btn common-btn loading-disabled" onclick="finishLoading(); gameActions.resultStep();">지구식단 도시락 만드는 중 ...</button>
  </div>
</div>
<script>
  function finishLoading() {
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 로딩 완료`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `로딩 완료`,
    });
  }

  // 버튼 비활성화
  $(' .loading-btn').prop('disabled', true);
  const loadingBtn = document.querySelector('.loading-btn');
  setTimeout(function() {
    loadingBtn.removeAttribute('disabled');
    loadingBtn.classList.remove('loading-disabled');
    $(".loading-btn").text('결과 보러 가기');
    $('.loading-btn').prop('disabled', false);
  }, 3500); // 배경지 바꾸기 const images=['<?= CDN_PATH ?>/assets/images/game207/loading/loading1.png', '<?= CDN_PATH ?>/assets/images/game207/loading/loading2.png' , '<?= CDN_PATH ?>/assets/images/game207/loading/loading3.png' ]; const preloadedImages=[]; // 이미지를 저장할 배열 let index=0; // 이미지를 미리 로드하여 캐시에 저장 // images.forEach(imageUrl=> {
  // const img = new Image();
  // img.src = imageUrl;
  // preloadedImages.push(img);
  // });


  let index = 0;

  function changeBackground() {
    $(".peng-bg").hide();
    $(`.animation-index-${index}`).show();

    index = (index + 1) % 3;
  }

  setInterval(changeBackground, 500); // 0.5초마다 이미지 변경

  // 스와이퍼 기능
  $(function() {
    let charaterNum = '1';
    const swiper = new Swiper(".loading-slider", {
      spaceBetween: 55,
      centeredSlides: true,
      slidesPerView: 3,
      effect: "coverflow",
      roundLengths: true,
      autoplay: {
        delay: 400,
        disableOnInteraction: false
      },
      touchRatio: 0, //드래그 금지
      allowTouchMove: false,
      loopAdditionalSlides: 0,
      centeredSlides: true,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 10,
        modifier: 1,
        scale: 0.9,
        slideShadows: false,
      },
      loop: true,
      keyboard: {
        enabled: true,
        onlyInViewport: false
      },
      on: {
        slideChange: function() {
          const activeSlideIndex = this.activeIndex;
          const activeSlide = this.slides[activeSlideIndex];
          const selectedCharacter = activeSlide.innerHTML;
          charaterNum = selectedCharacter.slice(71, 72);
        }
      }
    });
  });
</script>