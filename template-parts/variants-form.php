<?php 
 $group_id = get_field('related_k8tax_group', get_queried_object());
 $args=[
    'post_type' => 'k8pt_review',
    'limit' => '-1',
    'meta_key' => 'k8_cmn_display_fields',
    'meta_value' => 1,
    'tax_query' => [[
          'taxonomy' => 'k8tax_group',
          'field' => 'term_id',
          'terms' => $group_id
        ]],    

];
$variants = new wp_query($args);
$variants = $variants->get_posts();
?>
<?php if($variants):?>
<div class="variant-container">
    <form action="" method="GET">
        <div class="comparison__title display-3"><?=__("Вы можете выбрать сервисы и начать сравнение")?></div>
        <div class="variant-list variant-list--comparison">
            <?php foreach($variants as $variant):?>
                <div class="variant-list__el">
                    <label class="variant-opts"><?= get_the_post_thumbnail($variant->ID, 'thumbnail', array('class' => 'variant-opts__img') ); ?>
                    <div class="variant-opts__title"><?= get_field('k8_cmn_service_name', $variant->ID)?></div>
                    <input class="variant-opts__checkbox" type="checkbox"
                    name="variant[]" value="<?= $variant->ID?>"
                    <?php if(isset( $_GET['variant']) && in_array($variant->ID, $_GET['variant'])) echo "checked";?>>
                    </label>
                </div>
            <?php endforeach;?>
        </div>
        <div class="chat__btn-wrapper chat__btn-wrapper--visible">
        <button class="btn chat__btn btn--reset"><?=__("Сравнить")?></button>
        </div>
    </form>
</div>
<?php endif;?>