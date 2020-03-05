<?php
/**
 * The template for displaying comparison pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Reacher89
 */
 
$reviews = null;

$cmn_fields = ['k8_cmn_lang','k8_cmn_free'];

  if(isset($_GET['variant'])) {

    $tax_query = null;
    $args = [
    'post_type' => 'k8pt_review',
    'post__in' => $_GET['variant'],
    'orderby'=> 'rand'];
$reviews = new wp_query($args);
$reviews = $reviews->get_posts();

 }
get_header();?>
<main>
    <?php if($reviews):?>
    <div class="comparison__container">
      <table class="comparison__table">
        <tr class="comparison__row comparison__heading">
          <th class="comparison__cell">Название</th>

          <?php foreach($reviews as $review):?>
          <th class="comparison__cell">
            <a href="<?=get_post_permalink($review->ID)?>" target="_blank">
              <?=get_field('k8_cmn_service_name', $review->ID)?>
            </a>
          </th>
          <?php endforeach;?>

        </tr>

        <?php 
        $review_id = $reviews[0]->ID;
        $groups = acf_get_field_groups(['post_id' => $review_id]);
        usort($groups, function ($a, $b) { return $a['menu_order'] - $b['menu_order']; });
        $groupID = $groups[count($groups)-1]['ID'];
        $custom_fields = acf_get_fields($groupID);
        $common_fields = [];
        foreach($cmn_fields as $cmn_field){
          $common_fields[] = get_field_object($cmn_field, $review_id);
        }
        $fields = array_merge($common_fields, $custom_fields);

        foreach($fields as $field):
        ?>
        <tr class="comparison__row">
          <td class="comparison__cell"><?=$field['label']?></td>
          <?php foreach($reviews as $review):
                $field_content = get_field($field['name'], $review->ID);
                $incorrect = '<i class="fas fa-times">';
                if(is_array($field_content)) {
                    if(count($field_content) == 0)
                      $value = $incorrect;
                    else 
                      $value = implode(', ' , array_column($field_content, 'label'));
                } elseif(is_bool($field_content)) {
                    $class = $field_content ? 'fa-check': 'fa-times';
                    $value = '<i class="fas ' . $class . '">';
                } else $value = $field_content;
            
            ?>
            <td class="comparison__cell"><?= $value != '' ? $value:  $incorrect ?></td>
          <?php endforeach?>
        </tr>
          <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>
    <?php get_template_part( 'template-parts/variants-form', 'variants-form' );?>		
    <div class="tab">
    <?php if(false):?>
      <ul class="tab__list" role="tabblist">
        <li class="tab__item"><a class="btn btn--tab" href="?sort=popular">Популярные</a></li>
        <li class="tab__item"><a class="btn btn--tab" href="?sort=new">Новые</a></li>
        <li class="tab__item"><a class="btn btn--tab" href="?sort=old">Старые</a></li>
      </ul>
    <?php endif;?>  
      <section class="tab__panel">
        <div class="article-list">
<?php while (have_posts() ) :the_post(); ?>
  <?php get_template_part( 'template-parts/article-card', 'article-card' );?>		
<?php endwhile;?>
</div>
<?php Kd89Helper::pagination();?>
<? wp_reset_query();?>
</section>
    </div>
    <section class="page__additional">
      <?php get_template_part( 'template-parts/tax_description-block', 'tax_description' );?>		
      <?php get_template_part( 'template-parts/social-block', 'social-block' );?>		
    </section>
  </main>   
<?php
get_footer();
