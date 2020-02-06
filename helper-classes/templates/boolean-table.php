<div class="info info__table info__table--theme-check">
    <?php
     foreach($table_data as $key => $value):?>
    <div class="info__row">
        <div class="info__key"><?=$key?></div>
        <div class="info__value"><i class="fas <?= $value ? 'fa-check': 'fa-times'?>"></i></div>
    </div>           
    <?php endforeach;?>     
</div>