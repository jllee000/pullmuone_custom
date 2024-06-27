<?php


$resultArray = [
  'ENTP' => ['원칙파괴 도파민 중독자', '한계 안에 갖힌 나를 꺼내줄 최고의 파트너', '자기가 하고 싶은대로 해 나를 힘들게 할 최악의 파트너'],
  'ESFP' => ['뇌피셜 빌런', '같은 방향을 바라보면 누구보다 더 시너지가 날 파트너', '끝맺음을 하지 못해 흐지부지 끝나는 최악의 파트너'],
  'ESTP' => ['합리적인 번복 빌런', '손실날 때 정신승리로 극복중인 나를 다그치며 이끌어 줄 파트너', '의견을 자꾸 번복해 나를 혼란스럽게 할 최악의 파트너'],
  'ENFJ' => ['침착한 맑눈광', '내가 믿고 함께할 수 있는 최고의 파트너', '미래만 생각해 나를 답답하게 만들 최악의 파트너'],
  'ENTJ' => ['국가권력급 투자자', '내가 믿고 따라갈 수 있는 투자전문가 파트너', '누구말이 맞는지 팩트로 싸우다가 끝날 최악의 파트너'],
  'ESFJ' => ['낙관적인 평균무새', '가끔씩 변덕 부리더라도 항상 그 자리에 있어줄 최고의 파트너', '안정추구 성향이 비슷해서 투자에서는 시너지가 안나는 파트너'],
  'ENFP' => ['한 방 호소인', '나에게 가끔씩 참신한 영감을 불러일으키는 파트너', '한방만 노리다가 다같이 망할수도 있는 파트너'],
  'ESTJ' => ['반박불가 팩폭장인', '내 꿈을 논리정연하게 실현시킬 방법을 알려줄 최고의 파트너', '틀린 것 가지고 계속 규칙대로 하겠다는 꽉막힌 파트너'],
  'INFP' => ['셀프 희망고문 장인', '내가 정한 규칙이 틀려도 따뜻하게 지지해줄 파트너', "잘못된 신념으로 거절 못하는 나를 위험에 빠뜨릴 파트너"],
  'INTP' => ['꿈만 큰 몽상가', '파트너의 상상력에 나의 계획성을 더하면 최고의 파트너', '꿈보다 해몽, 현실 파악 못하는 최악의 파트너'],
  'ISFP' => ['쫄보 갓반인', '순수한 시선으로 100% 나를 지지해줄 최고의 파트너', '이러지도 저러지도 못하면서 눈치만 보는 최악의 파트너'],
  'ISTP' => ['실수 제로 휴먼 AI', '내 계획에 착오가 없는지 꼼꼼히 확인해줄 최고의 파트너', '틀에서 벗어나려 하지 않아 답답하게 할 최악의 파트너'],
  'INFJ' => ['역발상이 취미인 청개구리', '상호 존중과 상호 지지로 견고한 투자로 이어질 파트너', '이미 끝난 일을 다시 가져와 나를 힘들게 할 최악의 파트너'],
  'INTJ' => ['빈틈없는 투자의 정석', '덤벙대는 나를 A to Z 꼼꼼히 챙겨줄 최고의 파트너', '나의 말이 자꾸 오답이라고 하는 최악의 파트너'],
  'ISFJ' => ['스윗한 안전빵', '안정적인 투자를 할 수 있도록 도와줄 최고의 파트너', '함께하면 아무일도 일어나지 않을 파트너'],
  'ISTJ' => ['프로 규칙러', '꼼꼼함과 추진력으로 잘 이끌어 줄 최고의 파트너', '아닌 거 같다 해도 듣지 않는 최악의 파트너']
];

foreach ($dao->questionResult as &$qrst) {
  $qrst['title'] = $resultArray[$qrst['result']][0];
}

$relationTypeTitle = isset($relationConfig['title']) ? $relationConfig['title'] : '투자 능력 궁합';

$relationTypeTable = array_map(function ($scoreResult) {
  return [
    'good' => $scoreResult['good'],
    'bad' => $scoreResult['bad'],
  ];
}, $dao->questionResult);

$relationshipTextTable = array_map(function ($resultArray) {
  return explode('[]', $resultArray['title']);
}, $dao->questionResult);

// 새롭게 커스텀한 title
$relationValue = array_map(function ($resultArray) {
  return $resultArray;
}, $resultArray);

$relationGoodAndBad = [];

if (isset($relationTypeTable[$resultScore])) {
  $relationGoodAndBad = $relationTypeTable[$resultScore];
}

$relationGoodAndBad = array_filter($relationGoodAndBad, function ($relationItem) {
  return !empty($relationItem);
});

?>

<div class="result-box type">
  <h4 class="result-box-title"><?= $relationTypeTitle ?></h4>

  <div class="img-halt-box">
    <div class="list most_types">
      <?php foreach ($relationGoodAndBad as $relKey => $rel) : ?>

        <a href="./result?score=<?= $rel ?>">
          <li>
            <img src="<?= $dao->questionResult[$rel]['mainImg'] ?>" alt="" class="img-responsive">
            <div class="goodbad-area">
              <p class="<?= $relKey ?>">
                <?php if ($relKey == 'good') {
                  echo '최고';
                } else if ($relKey == 'bad') {
                  echo '최악';
                } ?></p>

              <span class="label-bottom-title">
                <?php
                if (isset($resultArray[$rel])) {
                  echo htmlspecialchars($resultArray[$rel][0], ENT_QUOTES, 'UTF-8');
                }
                ?>
              </span>
              <span class="label-bottom">
                <?php
                if (isset($resultArray[$rel]) && $relKey == 'good') {
                  echo htmlspecialchars($resultArray[$rel][1], ENT_QUOTES, 'UTF-8');
                ?>
                <?php }
                if (isset($resultArray[$rel]) && $relKey == 'bad') {
                  echo htmlspecialchars($resultArray[$rel][2], ENT_QUOTES, 'UTF-8');
                }
                ?>
              </span>
            </div>
          </li>
        </a>

      <?php endforeach; ?>
    </div>
  </div>
</div>