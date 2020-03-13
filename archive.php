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
    <div class="tab">
      <ul class="tab__list" role="tabblist">
        <li class="tab__item"><a class="btn btn--tab" href="?sort=popular">Популярные</a></li>
        <li class="tab__item"><a class="btn btn--tab" href="?sort=new">Новые</a></li>
        <li class="tab__item"><a class="btn btn--tab" href="?sort=old">Старые</a></li>
      </ul>
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
    	<?php if(false):?>
      <div class="social__block">
        <ul class="social__list">
          <li class="social__item"><a class="social__link" href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
          <li class="social__item"><a class="social__link" href="javascript:void(0);"><i class="fab fa-youtube"></i></a></li>
          <li class="social__item"><a class="social__link" href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
          <li class="social__item"><a class="social__link" href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
        </ul>
      </div>
      <?php endif; ?>
    </section>
  </main>   
<?php
get_footer();
