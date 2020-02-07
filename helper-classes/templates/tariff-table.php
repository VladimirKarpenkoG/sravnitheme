<?php
$tarrifs = get_field('k8_cmn_prc');
if($tarrifs):?>
<div class="col-12 col-sm-6 col-lg-12">
    <div class="info info__list">
        <div class="info__title">Тарифы</div>
        <?php foreach($tarrifs as $tariff):?>
            <div class="info__value"><?php echo $tariff['tarif_name'] . ' - ' . $tariff["curr"]["label"] . $tariff['amount_money']. '/месяц'?></div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif;?>