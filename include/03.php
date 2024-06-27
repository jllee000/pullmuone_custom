<?php

/**
 * [GL Guide]: 캐릭터 만들기 방식
 * 1. 이미지 경로 넣을 때는 CDN_PATH 잊지 말자!
 *   - 예시: CDN_PATH . '/assets/images/game41/upload/' . $quizData['file_name_reg']
 * 2. selectObject() 함수를 활용하여 데이터를 전송하자!
 *   - gameActions.selectObject(_category, _objectSeq);
 */
$categoryData = $dao->getObjectList();
$category_keys = array_keys($categoryData['data']);
?>

<div id="scroll-container">
  <div class="step3">
    <div class="custom-area">
      <div class="custom-top">

        <div class="avatar-wrap">
          <img class="img-width custom-ani img-object layer-level0" src='https://cdn.banggooso.com/assets/imgobject/game207/default.png' style='z-index:0; position:absolute;' />
        </div>
      </div>
      <div class="custom-mid flex-row ">
        <div class="scroll-btn prev"></div>
        <ul class="category-inner flex-row">
          <?php foreach ($categoryData['data'] as $key => $cate) : ?>
            <?php if ($cate['layer_level'] !== '1') : ?>
              <li class="custom-category category category-<?= $key ?>" data-seq="<?= $key ?>">
                <?= $cate['category_name'] ?>
              </li>
            <? endif; ?>
          <? endforeach; ?>
        </ul>
        <div class="scroll-btn next"></div>

      </div>

      <div class="custom-bottom-group group">
        <div class="item-wrapper">
          <div class="forscroll">
            <?php foreach ($categoryData['data'] as $key => $cate) : ?>
              <div class="category-item <?= $key ?>" data-seq="<?= $key ?>">
                <?php foreach ($cate['sub_categories'] as $scName => $itemList) : ?>
                  <?php if ($itemList['view_state']) : ?>
                    <div class="sub-category"><?= $itemList['sub_category_name'] ?></div>
                  <?php endif; ?>
                  <ul class="item-list custom-bottom  flex-row">
                    <?php foreach ($itemList['list'] as $item) : ?>
                      <li class="item-li custom-img">
                        <div class="delete-img del-<?= $item['seq'] ?>" alt="<?= $item['desc'] ?> 삭제버튼" onclick="deleteObject('<?= $item['seq'] ?>', '<?= $item['layer_level'] ?>');"></div>
                        <img class="img-width custom-ani" src="<?= $item['thumbnail'] ?>" alt="<?= $item['desc'] ?>" onclick="clickObject('<?= $item['category_seq'] ?>','<?= $item['sub_category_seq'] ?>', '<?= $item['seq'] ?>', '<?= $item['layer_level'] ?>');">
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          </div>

        </div>


      </div>

    </div>
    <div class="custom-btn-div">
      <div class="custom-grad">

      </div>
      <button class="common-btn" onclick="customFinish();">나만의 펭꾸 완성하기</button>
    </div>
  </div>

</div>

<script>
  initObject = {}
  $(document).ready(function() {
    // startModal();
    firstSetting();
    $('.app-header.page').addClass('black');
    toggleItems();

  });

  // 카테고리 스크롤 
  let isDragging = false;
  let startX, scrollLeft;

  $('.category-inner').on('mousedown', function(e) {
    isDragging = true;
    startX = e.pageX - $('.category-inner').offset().left;
    scrollLeft = $('.category-inner').scrollLeft();
  });

  $('.category-inner').on('mouseleave', function() {
    isDragging = false;
  });

  $('.category-inner').on('mouseup', function() {
    isDragging = false;
  });

  $('.category-inner').on('mousemove', function(e) {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - $('.category-inner').offset().left;
    const walk = (x - startX) * 2;
    $('.category-inner').scrollLeft(scrollLeft - walk);
  });

  function fnMove(seq) {
    var offset = $('#div' + seq).offset();
    $('html, body').animate({
        scrollTop: offset.top,
      },
      400
    );
  }

  var selectedCategory = <?= min($category_keys) ?>;
  const categoryItems = document.querySelectorAll('.custom-category');
  const firstCategory = document.querySelector(`.custom-category[data-seq="256"]`);
  firstCategory.classList.add('active');

  categoryItems.forEach(item => {
    item.addEventListener('click', function() {
      categoryItems.forEach(item => {
        item.classList.remove('active');
      });

      const dataSeq = this.getAttribute('data-seq');
      const targetItem = document.querySelector(`.custom-category[data-seq="${dataSeq}"]`);
      if (targetItem) {
        targetItem.classList.add('active');
      }
    });
  });

  $("li.category").mouseup(function() {
    $("li.category").removeClass("active");
    $(this).addClass("active");
    selectedCategory = $(this).data('seq');
    toggleItems();
  })

  // 초기에 기본 클릭된 상태로 세팅하기! (첫번째 커스텀만)
  async function firstSetting() {
    $('li.category:first').addClass("active"); // 첫번째 카테고리 선택
    await clickObject("256", "263", "1088", "-1");
    await clickObject("257", "264", "1094", "1");
    await clickObject("259", "266", "1109", "2");
    await clickObject("258", "265", "1100", "3");
    await clickObject("260", "267", "1118", "4");
    await clickObject("261", "268", "1148", "5");
    await clickObject("262", "269", "1147", "6");
  }

  function toggleItems() {
    $(".category-item").each(function(idx, item) {

      if ($(item).data('seq') === selectedCategory) {
        $(item).show();
      } else {
        $(item).hide();
      }
    })
  }

  /**
   * 게임 페이지에서 사용하세요
   * 아바타 객체 선택
   */
  async function clickObject(_category_seq, _sub_category_seq, _objectSeq, _layer_level) {
    const objects = <?= json_encode($categoryData['data']) ?>;
    let _object = objects[_category_seq]['sub_categories'][_sub_category_seq]['list'].find((i) => i.seq === _objectSeq);

    if ($('.avatar-wrap').contents().hasClass('layer-level' + _object['layer_level'])) {
      $('.avatar-wrap > .img-object.layer-level' + _object['layer_level']).remove();
    }

    await $('.avatar-wrap').append(
      $('<img/>')
      .addClass('img-object')
      .addClass('avatar-object')
      .addClass('layer-level' + _object['layer_level'])
      .attr('src', _object['image'])
      .attr('data-layer', _object['layer_level'])
      .attr('style', 'z-index:' + _object['layer_level'] + ';')
    );

    await $('.category-item.' + _category_seq + ' .delete-img').hide();
    await $('.del-' + _objectSeq).show();
    await myAvatarGameActions.selectObject(_object['layer_level'], _object['seq'], () => {
      initObject[_object['layer_level']] = true
    });
  }

  /**
   * 게임 페이지에서 사용하세요
   * 아바타 객체 삭제
   */

  $(".custom-category").click(function() {
    $(".custom-category").removeClass("active");
    $(this).addClass("active");
    selectedCategory = $(this).data('seq');
    toggleItems();
  })

  function toggleItems() {
    $(".category-item").each(function(idx, item) {

      if ($(item).data('seq') === selectedCategory) {
        $(item).show();
      } else {
        $(item).hide();
      }
    })
  }

  async function containDefault() {
    for (var i = -1; i < 7; i++) {
      if (i == 0) {
        console.log('아바타 본체')
      } else {
        if (i in initObject) {
          console.log('true', i);
        } else {
          // 직접 하나하나 지정 필요!
          if (i == -1) {
            await clickObject("256", "263", "1088", "-1");
          } else if (i == 1) {
            await clickObject("257", "264", "1094", "1");
          } else if (i == 2) {
            await clickObject("259", "266", "1109", "2");
          } else if (i == 3) {
            await clickObject("258", "265", "1100", "3");
          } else if (i == 4) {
            await clickObject("260", "267", "1118", "4");
          } else if (i == 5) {
            await clickObject("261", "268", "1148", "5");
          } else if (i == 6) {
            await clickObject("262", "269", "1147", "6");
          } else {
            console.log('error');
          }
        }
      }

    }
  }

  // 클래스 있는지 여부 확인
  function hasClass(element, className) {
    return element.classList.contains(className);
  }

  async function customFinish() {
    await containDefault()
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 커스텀 완료`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `커스텀 완성하기 버튼`,
    });
    await myAvatarGameActions.nextStep();
  }


  $('div.prev').click(function() {

    let _scrollX = $('ul.category-inner').scrollLeft();
    let _prevEl = $("li.category.active").prev();

    if (_prevEl.length > 0) {
      if (hasClass(_prevEl[0], 'category-256')) {
        console.log('바뀐거', _prevEl[0]);
        $('ul.category-inner').scrollLeft(_scrollX - 150);
      } else {
        $('ul.category-inner').scrollLeft(_scrollX - 50);
      }
      $("li.category").removeClass("active");
      $(_prevEl).addClass("active");
      selectedCategory = $(_prevEl).data('seq');
      toggleItems();
    }
  });

  $('div.next').click(function() {

    let _scrollX = $('ul.category-inner').scrollLeft();
    let _nextEl = $("li.category.active").next();

    if (_nextEl.length > 0) {

      if (hasClass(_nextEl[0], 'category-262')) {
        $('ul.category-inner').scrollLeft(_scrollX + 150);
      } else {
        $('ul.category-inner').scrollLeft(_scrollX + 50);
      }

      $("li.category").removeClass("active");
      $(_nextEl).addClass("active");
      selectedCategory = $(_nextEl).data('seq');
      toggleItems();
    }
  });
</script>