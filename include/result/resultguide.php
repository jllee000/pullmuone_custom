<div class="result-guide">
  <div class="todo-box">
    <?php foreach ($resultObjects['data'] as $data) :
      if (!empty($foodSet[$data['seq']])) : ?>
        <img class="img-width" src="<?= $todoData[$foodSet[$data['seq']]]['todo'] ?>" />
      <? endif; ?>
    <?php endforeach ?>
  </div>
  <div class="guide-box">
    <?php foreach ($resultObjects['data'] as $data) :
      if (!empty($foodSet[$data['seq']])) : ?>
        <img class="img-width" src="<?= $guideData[$foodSet[$data['seq']]]['guide'] ?>" />
      <? endif; ?>
    <?php endforeach ?>
  </div>
</div>