<?php
// data.json 파일 읽기
$jsonData = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/gl/213/include/data/data.json');

// JSON 데이터를 배열로 디코딩
$data = json_decode($jsonData, true);

// 분석 결과 리스트 초기화
$todoList = [];
$famousTxt = "";
$famousTxt2 = "";
$tipTxt = "";
$famousImg = "";
$landingLink = '';
// data.json 데이터에서 type이 $resultScore인 항목 찾기
foreach ($data as $entry) {
  if ($entry['type'] === $resultScore) {
    $todoList = $entry['check'];
    $famousTxt = $entry['content'];
    $entry['content'];
    $famousTxt2 = $entry['content2'];
    $tipTxt = $entry['tip'];
    $famousImg = $entry['img'];
    break;
  }
}
if ($resultScore == 'ISTP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/Up46VevJLEGja28Li622AQ?adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ISTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ISTP';
  $bannerLink = "https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ISTP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ISTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ISTP";
} else if ($resultScore == 'ISTJ') {
  $landingLink = "https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/uYEO0hLvXUuob2oGWZw7Eg&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ISTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ISTJ";
  $bannerLink = "https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ISTJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ISTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ISTJ";
} else if ($resultScore == 'ISFP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/TuqfxeL5J0yvret7bjr7eA&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ISFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ISFP';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ISFP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ISFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ISFP';
} else if ($resultScore == 'ISFJ') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/zHOswNQQWku8XMR00rzUhQ&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ISFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ISFJ';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ISFJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ISFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ISFJ';
} else if ($resultScore == 'INTP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/XRnq7R9lHkiLZz5tppgcWg&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=INTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=INTP';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_INTP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_INTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_INTP';
} else if ($resultScore == 'INTJ') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/amwXgWejDE2kP9EefMh4dw&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=INTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=INTJ';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_INTJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_INTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_INTJ';
} else if ($resultScore == 'INFP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/Y71Bd7KonESCiIbf3TcZNA&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=INFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=INFP';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_INFP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_INFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_INFP';
} else if ($resultScore == 'INFJ') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/McssW89JN02w7dIHa5USuQ&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=INFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=INFJ';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_INFJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_INFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_INFJ';
} else if ($resultScore == 'ESTP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/b4ptK513mESk8G7uKjUu5w&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ESTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ESTP';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ESTP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ESTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ESTP';
} else if ($resultScore == 'ESTJ') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/m73vBzFlH0iYsscHFLVssg&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ESTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ESTJ';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ESTJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ESTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ESTJ';
} else if ($resultScore == 'ESFP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/Osqbusklp0GQJlIARXGg0g&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ESFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ESFP';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ESFP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ESFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ESFP';
} else if ($resultScore == 'ESFJ') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/KQ7pXYWuxEeun0VxDSUTIQ&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ESFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ESFJ';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ESFJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ESFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ESFJ';
} else if ($resultScore == 'ENTP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/ap5vQ6V68UK11C8NA5abjw&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ENTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ENTP';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ENTP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ENTP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ENTP';
} else if ($resultScore == 'ENTJ') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/NKkVfyT7oEGRjbRI74ui0g&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ENTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ENTJ';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ENTJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ENTJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ENTJ';
} else if ($resultScore == 'ENFP') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/sP3tZwgwBEubN7ucPqTXJw&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ENFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ENFP';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ENFP%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ENFP&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ENFP';
} else if ($resultScore == 'ENFJ') {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/H0tb7hXdSkCCBqHgXU8IhA&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=ENFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=ENFJ';
  $bannerLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account_ENFJ%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account_ENFJ&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account_ENFJ';
} else {
  $landingLink = 'https://mYH2l72s6E2eyTYGyMO9KA.ap1.adtouch.dfinery.io/api/v1/click/DcU6Sclr90ajZca1vfPy8A?m_adtouch_custom_url=https%3A%2F%2Fdigital.securities.miraeasset.com%2Ffirst-time%2F%3Futm_campaign%3Dnew_ad%26utm_medium%3DCRM%26utm_source%3Dviral%26utm_content%3Dopen_account%26utm_term%3DCRM&adv_campaign=new_ad&adv_ad=&adv_adgroup=&adv_agency=viral&adv_creative=open_account&adv_keyword=CRM&adv_placement=CRM&utm_source=viral&utm_medium=CRM&utm_campaign=new_ad&utm_term=CRM&utm_content=open_account';
}
// 분석 결과 리스트가 비어 있는 경우 경고 메시지 설정 (디버깅 목적)
if (empty($analyticsList)) {
  error_log("No analytics found for type: $resultScore");
}

?>
<div class="result-mid">
  <div class="result-mylist">
    <div class="result-desc-title">투자 만렙 되는 체크리스트</div>
    <div class="result-desc-box">
      <?php foreach ($todoList as $item) : ?>
        <div class="result-desc-li">
          <div class="check-img"><img class="img-width" src="https://cdn.banggooso.com/assets/images/game213/result/check_circle.png" /></div>
          <div><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="if-box">
    <div class="result-desc-title">이렇게 하면 나도 인생역전?</div>

    <div class="result-desc-box result-desc-box-3">
      <img class="img-width" src=<?= $famousImg ?> />
    </div>
  </div>
  <div class="tip-box">
    <div class="result-desc-box result-desc-box-2">
      <div class="result-desc-semi-title">
        투자에 도움이 되는 팁
      </div>
      <div class="result-desc-semi-txt">
        <?= $tipTxt ?>
      </div>
      <div><a class="txt-center" onclick="moveToLink(`<?= $landingLink ?>`,`<?= $resultScore ?>`);">
          <div class="common-btn fund-landing-btn">투자 만렙에 한 단계 더 다가가기 <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.74951 7L0.874512 2.125C0.645345 1.89583 0.530762 1.60417 0.530762 1.25C0.530762 0.895833 0.645345 0.604167 0.874512 0.375C1.10368 0.145833 1.39535 0.03125 1.74951 0.03125C2.10368 0.03125 2.39535 0.145833 2.62451 0.375L8.37451 6.125C8.49951 6.25 8.58805 6.38542 8.64014 6.53125C8.69222 6.67708 8.71826 6.83333 8.71826 7C8.71826 7.16667 8.69222 7.32292 8.64014 7.46875C8.58805 7.61458 8.49951 7.75 8.37451 7.875L2.62451 13.625C2.39535 13.8542 2.10368 13.9688 1.74951 13.9688C1.39535 13.9688 1.10368 13.8542 0.874512 13.625C0.645345 13.3958 0.530762 13.1042 0.530762 12.75C0.530762 12.3958 0.645345 12.1042 0.874512 11.875L5.74951 7Z" fill="white" />
            </svg>
          </div>
        </a></div>
    </div>
  </div>
  <div class="success-box">
    <div class="result-desc-title">투자가 어려워? <br /> 작은 것부터 시작해 보면 되지!</div>
    <div onclick="moveToBannerLink(`<?= $bannerLink ?>`,`<?= $resultScore ?>`);"><img class="img-width" src="https://cdn.banggooso.com/assets/images/game213/result/event3.png" /></div>
    <div class="event-about-box"><img class="img-width" src="https://cdn.banggooso.com/assets/images/game213/result/notice2.png" /></div>
  </div>
</div>

<script>
  function moveToBannerLink(_banner, _score) {
    gameActions.moveToBannerLink(_banner);
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 배너 랜딩 - ${_score}`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `${JS_GAME_TITLE} - 배너 랜딩 - ${_score}`,
    });
  }

  function moveToLink(_banner, _score) {
    gameActions.moveToBannerLink(_banner);
    func_handleEventGtag({
      _title: `${JS_GAME_TITLE} - 이벤트 버튼 - ${_score}`,
      _category: `${JS_GAME_TITLE} - ${pageTypeText[JS_PAGE_TYPE]}`,
      _label: `${JS_GAME_TITLE} - 이벤트 버튼 - ${_score}`,
    });
  }
</script>