<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Reacher89
 */

get_header();?>
<main>
<h1 class="article__title"><?php single_term_title(); ?></h1>
<?php get_template_part( 'template-parts/tax_description-block', 'tax_description' );?>	
    <div class="tab">
      <?php
      $term = get_queried_object(); 
      if(get_post_type() != 'downloads' || $term->taxonomy != 'k8dl_group' ):?>
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
    	<?php if(false):?>
        <?php get_template_part( 'template-parts/social-block', 'social-block' );?>
      <?php endif; ?>
    </section>
  </main>   
<?php
get_footer();
