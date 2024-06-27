<div class="step1" onclick="myAvatarGameActions.nextStep()">
  <div class="pos-ab bubble-deco"><img class="img-width" src="<?= CDN_PATH ?>/assets/images/game207/result/bubble1.png" /> </div>
  <div class="message-pop">


    <img src="<?= CDN_PATH ?>/assets/images/game207/dm/dm.png" class="img-width" />
  </div>

</div>
<?php

$categoryData = $dao->getObjectList();
$category_keys = array_keys($categoryData['data']); ?>

<?php foreach ($categoryData['data'] as $key => $cate) : ?>

  <?php foreach ($cate['sub_categories'] as $scName => $itemList) : ?>
    <ul class="preload">
      <?php foreach ($itemList['list'] as $item) : ?>
        <li class="preload">
          <img class="img-width" src="<?= $item['thumbnail'] ?>" alt="<?= $item['desc'] ?>">
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endforeach; ?>

<?php endforeach; ?>
<script>
  $('.app-main').scrollTop(0);
</script>