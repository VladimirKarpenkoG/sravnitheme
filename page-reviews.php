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
    <div class="review-tabs">
      <ul class="review-tabs__list" role="tabblist">
        <li class="review-tabs__item"><a class="review-tabs__btn btn" href="#!" role="tab" id="popular-tab" aria-controls="popular-panel" aria-selected="true">Популярные</a></li>
        <li class="review-tabs__item"><a class="review-tabs__btn btn" href="#!" role="tab" id="new-tab" aria-controls="new-panel" aria-selected="false">Новые</a></li>
        <li class="review-tabs__item"><a class="review-tabs__btn btn" href="#!" role="tab" id="old-tab" aria-controls="old-panel" aria-selected="false">Старые</a></li>
      </ul>
    </div>
    <section class="rewivews__tab" role="tabpanel" id="popular-panel" aria-labelledby="popular-tab">
        <div class="review-list">

            <?php
                $loop = new WP_Query( array(
                    'post_type' => 'k8pt_review',
                    'posts_per_page' => 3)
                );
                ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="review__card-wrapper">
                    <article class="review__card">
                        <div class="review__card-content">
                            <?= get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'review__card-img') ); ?>
                        <div class="review__card-header">
                            <h2 class="review__card-title"><a href="#!"><?= the_title()?></a></h2>
                            <author class="review__card-author"><a href="#!">Автор: <?= the_author('',false )?></a></author>
                        </div>
                        <p class="review__card-text need-truncate" data-max-lines="6">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis facilis aspernatur quidem quas pariatur, aliquam molestias dolorem necessitatibus, modi dignissimos ullam. Quibusdam, amet ab? Voluptatum rerum ea temporibus similique minus.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi molestiae numquam perspiciatis dolor fuga! Fugiat impedit est sapiente obcaecati nobis soluta ipsam, cupiditate voluptatem blanditiis adipisci facilis laborum quam deleniti.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem molestiae cumque nihil, voluptatem aliquid temporibus sequi suscipit maiores iste, cum excepturi sed fuga? Ad quas eos reprehenderit totam similique harum.
                        </p>
                        </div>
                        <div class="review__card-controls">
                        <div class="review__card-rating">
                            <img class="review__card-rating-image" src="/wp-content/themes/sravnitheme/icons/rate-icon.svg">
                            <span class="review__card-rating-count">23</span>
                        </div>
                        <a class="btn review__card-link" href="<?= get_permalink()?>">Читать</a>
                        </div>
                    </article>
                </div>

                <?php endwhile; wp_reset_query(); ?>
        </div>        
    </section>        
</main>        
			
<?php
get_footer();
