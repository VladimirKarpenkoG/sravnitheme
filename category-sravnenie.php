<?php
/**
 * The template for displaying comparison pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Reacher89
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 
$services = null;


 if(isset($_GET['variant'])) {

    $tax_query = null;
    $args=array(
    'post_type' => 'services',
    'post__in' => $_GET['variant'],
    'orderby'=> 'rand',
    'tax_query' => $tax_query
);
$services = new wp_query($args);
$services = $services->get_posts();
 }
get_header();?>
<main>
    <?php if($services):?>
    <div class="comparison__container">
      <table class="comparison__table">
        <tr class="comparison__row comparison__heading">
          <th class="comparison__cell">Название</th>
          <?php foreach($services as $service):?>
          <th class="comparison__cell">
            <a href="<?=get_post_permalink(get_field('review', $service->ID))?>" target="-_blank">
              <?=$service->post_title?>
            </a>
          </th>
          <?php endforeach;?>
        </tr>

        <?php 
        $review_id = get_field('review', $services[0]->ID);
        $groups = acf_get_field_groups(['post_id' => $review_id]);
        usort($groups, function ($a, $b) { return $a['menu_order'] - $b['menu_order']; });
        $groupID = $groups[count($groups)-1]['ID'];
        $custom_fields = acf_get_fields($groupID);
        foreach($custom_fields as $field):
        ?>
        <tr class="comparison__row">
          <td class="comparison__cell"><?=$field['label']?></td>
          <?php foreach($services as $service):
                $review = get_post(get_field('review', $service->ID));
                $field_content = get_field($field['name'], $review);
                
                if(is_array($field_content)) {
                    $value = implode(', ' , array_column($field_content, 'label'));
                } elseif($field_content == "" || is_bool($field_content)) {
                    
                    $class = $field_content ? 'fa-check': 'fa-times';
                    $value = '<i class="fas ' . $class . '">';
                } else $value = $field_content;
            
            ?>
            <td class="comparison__cell"><?= $value ?></td>
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
