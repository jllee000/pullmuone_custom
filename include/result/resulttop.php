<div class="result-top">
  <div class="result-title">
    <?= $dao->result['init_data']['nickname'] ?>님의 펭꾸 완성!
  </div>
  <div class="result-avatar">
    <div class="img-box">
      <div class="border-area">
        <div class="append-area-hide">
          <div class="capture-wrap" id="append-area">
            <div class="capture-overlay">
              <div class="pos-rel">
                <div class="rand-num">
                  <?= str_pad($resultCode, 8, '0', STR_PAD_LEFT) ?>
                </div>
                <div class="hastag">
                  <?php
                  $fationMatchingData = array();
                  foreach ($resultObjects['data'] as $data) :
                    if ($data['category_seq'] == "265") { // 상의
                      $fationMatchingData[0] = $data['seq'];
                    }
                    if ($data['category_seq'] == "266") { // 하의
                      $fationMatchingData[1] = $data['seq'];
                    }
                    if (!empty($foodSet[$data['seq']])) : ?>
                      <img class="img-width" src="<?= $foodData[$foodSet[$data['seq']]]['nameimg'] ?>" />
                    <? endif; ?>

                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <?php foreach ($resultObjects['data'] as $data) : ?>
              <img data-seq="<?= $data['seq'] ?>" class="capture-object" src="<?= $data['image'] ?>" style="z-index:<?= $data['layer_level'] ?> " />
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <p class="thumb-img-text">
        ▲&nbsp;&nbsp;꾹 눌러 이미지 저장하기&nbsp;&nbsp;▲
      </p>
    </div>
    <div class="result-txt-box">
      <div class="result-txt">
        <? if (!empty($fationData[$fationMatchingData[0] . "_" . $fationMatchingData[1]])) {
          echo $fationData[$fationMatchingData[0] . "_" . $fationMatchingData[1]];
        } else {
          echo "놀라운 패션 감각! 믹스매치의 신세계!";
        }
        ?>
      </div>
    </div>

  </div>
</div>
<script>

</script>