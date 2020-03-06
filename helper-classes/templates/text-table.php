<div class="info info__table info__table--theme-main">
    <?php foreach($table_data as $key => $value):?>
    <div class="info__row">
      <div class="info__key"><?=$key?></div>
      <div class="info__value"><?=str_replace(';', '<br>', $value)?></div>
    </div>
    <?php endforeach;?>
</div>