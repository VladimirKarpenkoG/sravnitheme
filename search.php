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
				<div class="article__card-wrapper">
					<article class="article__card">
					<div class="article__card-content">
						<?= get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'article__card-img') ); ?>
						<div class="article__card-header">
						<h2 class="article__card-title"><a href="<?=get_permalink()?>"><?= the_title()?></a></h2>
						<author class="article__card-author"><a href="<?= esc_url(get_author_posts_url(get_the_author_meta('ID')))?>">Автор: <?= the_author('',false )?></a></author>
						</div>
						<p class="article__card-text need-truncate" data-max-lines="6">
						<?= strip_tags(get_the_content(),'<a>');?>
						</p>
					</div>
					<div class="article__card-controls">
						<div class="article__card-rating">
							<img class="article__card-rating-image" src="/wp-content/themes/sravnitheme/icons/rate-icon.svg">
							<span class="article__card-rating-count"><?= get_comments_number() ?></span>
						</div>
						<a class="btn article__card-link" href="<?=get_permalink()?>">Читать</a>
					</div>
					</article>
				</div> 

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
