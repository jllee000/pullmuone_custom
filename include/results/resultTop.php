<?php
// data.json 파일 읽기
$jsonData = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/data/data.json');

// JSON 데이터를 배열로 디코딩
$data = json_decode($jsonData, true);

// 분석 결과 리스트 초기화
$analyticsList = [];

// data.json 데이터에서 type이 $resultScore인 항목 찾기
foreach ($data as $entry) {
  if ($entry['type'] === $resultScore) {
    $analyticsList = $entry['analytics'];
    break;
  }
}

// 분석 결과 리스트가 비어 있는 경우 경고 메시지 설정 (디버깅 목적)
if (empty($analyticsList)) {
  error_log("No analytics found for type: $resultScore");
}
?>
<div class="result-top">
  <?php
  $filename = $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/results/{$resultScore}.php";
  if (file_exists($filename)) {
    include_once $filename;
  }
  ?>

  <div class="chart-content">
    <div class="chart-title">투자 본능 분석 결과</div>
    <ul class="chart-list">
      <?php foreach ($analyticsList as $item) : ?>
        <li class="chart-list"><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
</div>