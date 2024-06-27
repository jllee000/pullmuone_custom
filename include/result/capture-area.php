<div class="custom-capture-wrapper">
  <div class="capture-wrap-big" id="custom-capture">
    <div class="capture-overlay">
      <div class="pos-rel">
        <div class="rand-num">
          <?= str_pad($resultCode, 8, '0', STR_PAD_LEFT) ?>
        </div>
        <div class="hastag">
          <?php foreach ($resultObjects['data'] as $data) :
            if (!empty($foodSet[$data['seq']])) : ?>
              <img class="img-width" src="<?= $foodData[$foodSet[$data['seq']]]['nameimg'] ?>" />
            <? endif; ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <?php foreach ($resultObjects['data'] as $data) : ?>
      <img data-seq="<?= $data['seq'] ?>" class="capture-object" src="<?= $data['image'] ?>" style="z-index:<?= $data['layer_level'] ?> " />
    <?php endforeach ?>
  </div>
</div>
<script>
  const resultCaptureObject = {};
  const dataArray = <?= json_encode($resultObjects['data']) ?>;

  dataArray.forEach(data => {
    // layer_level 
    const layerLevel = data['layer_level'];

    // layer_level이 존재하는지 확인 후 추가
    if (!(layerLevel in resultCaptureObject)) {
      resultCaptureObject[layerLevel] = true;
    }
  });

  async function containResultDefault() {
    for (var i = -1; i < 7; i++) {
      if (i == 0) {
        console.log('아바타 본체')
      } else {
        if (i in resultCaptureObject) {
          console.log('true', i);
        } else {
          // 얘네들은 직접 하나하나 지정 필요!
          if (i == -1) {
            $('.capture-wrap-big').append(`<img data-seq="1088" class="capture-object" src="https://cdn.banggooso.com/assets/imgobject/game207/items/background_01.jpg" style="z-index:-1 ">`)
          } else if (i == 1) {
            $('.capture-wrap-big').append(`<img data-seq="1094" class="capture-object" src="https://cdn.banggooso.com/assets/imgobject/game207/items/face_01.png" style="z-index:1 ">`);
          } else if (i == 2) {
            $('.capture-wrap-big').append(`<img data-seq="1109" class="capture-object" src="https://cdn.banggooso.com/assets/imgobject/game207/items/pants_01.png" style="z-index:2 ">`);
          } else if (i == 3) {
            $('.capture-wrap-big').append(`<img data-seq="1100" class="capture-object" src="https://cdn.banggooso.com/assets/imgobject/game207/items/top_01.png" style="z-index:3 ">`);
          } else if (i == 4) {
            $('.capture-wrap-big').append(`<img data-seq="1148" class="capture-object" src="https://cdn.banggooso.com/assets/imgobject/game165/items/none.png" style="z-index:4 ">`);
          } else if (i == 5) {
            $('.capture-wrap-big').append(`<img data-seq="1118" class="capture-object" src="https://cdn.banggooso.com/assets/imgobject/game207/items/food_01.png" style="z-index:5 ">`);
          } else if (i == 6) {
            $('.capture-wrap-big').append(`<img data-seq="1147" class="capture-object" src="https://cdn.banggooso.com/assets/imgobject/game165/items/none.png" style="z-index:6 ">`);
          } else {
            console.log('error');
          }
        }
      }

    }
  }
</script>