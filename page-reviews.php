<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Reacher89
 */

get_header();
?>
 <main>
    <div class="tab">
      <ul class="tab__list" role="tabblist">
        <li class="tab__item"><a class="btn btn--tab" href="javascript:void(0);" role="tab" id="popular-tab" aria-controls="popular-panel" aria-selected="true">Популярные</a></li>
        <li class="tab__item"><a class="btn btn--tab" href="javascript:void(0);" role="tab" id="new-tab" aria-controls="new-panel" aria-selected="false">Новые</a></li>
        <li class="tab__item"><a class="btn btn--tab" href="javascript:void(0);" role="tab" id="old-tab" aria-controls="old-panel" aria-selected="false">Старые</a></li>
      </ul>
      <section class="tab__panel" role="tabpanel" id="popular-panel" aria-labelledby="popular-tab">
        <div class="article-list">

        <?php
            //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $loop = new WP_Query( array(
                'post_type' => 'k8pt_review',
                'posts_per_page'=> -1,
                //'paged' => $paged
                )
            ); ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <!--div class="article__card-wrapper article__card-wrapper--lg"-->
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
        <?php endwhile; wp_reset_query(); ?>  
        </div>
        
        <?php if(false):?>
        <!-- PAGINATION-->
        <?php the_posts_pagination( array(
                'mid_size'  => 4,
                'end_size' => 1,
                'prev_text' => 'Предыдущая',
                'next_text' => 'Следующая',
            ) );  ?>
        <nav class="pagination" role="navigation" aria-label="Pagination">
          <ul class="pagination__list">
            <li class="pagination__item pagination__item--active"><a class="pagination__link" href="javascript:void(0);" aria-current="true" diasbled>1</a></li>
            <li class="pagination__item"><a class="pagination__link" href="javascript:void(0);">2</a></li>
            <li class="pagination__item"><a class="pagination__link" href="javascript:void(0);">3</a></li>
          </ul>
        </nav>
        <?php endif;?>
      </section>
    </div>
    <section class="page__additional">                       
      <blockquote class="message message--quote">
        <?= the_content();?>
      </blockquote>
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
