<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Reacher89
 */

get_header();?>
<main>
    <div class="tab">
      <section class="tab__panel" role="tabpanel" id="popular-panel" aria-labelledby="popular-tab">

		<?php if ( have_posts() ) : ?>
			<div class="article-list">
			<?php while ( have_posts() ) :the_post(); ?>
				<?php get_template_part( 'template-parts/article-card', 'article-card' );?>
			<?php endwhile;?>
			</div>
			<?php Kd89Helper::pagination();

				else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
		?>
		</section>
</div>

<? wp_reset_query();?>
  </main>   
<?php
get_footer();
