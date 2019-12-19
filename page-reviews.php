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
            <li class="tab__item"><a class="btn btn--tab" href="#!" role="tab" id="popular-tab" aria-controls="popular-panel" aria-selected="true">Популярные</a></li>
            <li class="tab__item"><a class="btn btn--tab" href="#!" role="tab" id="new-tab" aria-controls="new-panel" aria-selected="false">Новые</a></li>
            <li class="tab__item"><a class="btn btn--tab" href="#!" role="tab" id="old-tab" aria-controls="old-panel" aria-selected="false">Старые</a></li>
        </ul>
    <section class="tab__panel" role="tabpanel" id="popular-panel" aria-labelledby="popular-tab">
        <div class="article-list">

            <?php
                $loop = new WP_Query( array(
                    'post_type' => 'k8pt_review',
                    'posts_per_page' => 3)
                );
                ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="article__card-wrapper">
                    <article class="article__card">
                    <div class="article__card-content"><img class="article__card-img" src="/img/reviews_img.png">
                        <div class="article__card-header">
                        <h2 class="article__card-title"><a href="#!"><?= the_title()?></a></h2>
                        <author class="article__card-author"><a href="#!">Автор: <?= the_author('',false )?></a></author>
                        </div>
                        <p class="article__card-text need-truncate" data-max-lines="6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis facilis aspernatur quidem quas pariatur, aliquam molestias dolorem necessitatibus, modi dignissimos ullam. Quibusdam, amet ab? Voluptatum rerum ea temporibus similique minus.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi molestiae numquam perspiciatis dolor fuga! Fugiat impedit est sapiente obcaecati nobis soluta ipsam, cupiditate voluptatem blanditiis adipisci facilis laborum quam deleniti.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem molestiae cumque nihil, voluptatem aliquid temporibus sequi suscipit maiores iste, cum excepturi sed fuga? Ad quas eos reprehenderit totam similique harum.
                        </p>
                    </div>
                    <div class="article__card-controls">
                        <div class="article__card-rating"><img class="article__card-rating-image" src="/icons/rate-icon.svg"><span class="article__card-rating-count"><?= get_comments_number() ?></span></div><a class="btn article__card-link" href="#!">Читать</a>
                    </div>
                    </article>
                </div>

                <?php endwhile; wp_reset_query(); ?>
                <nav class="pagination" role="navigation" aria-label="Pagination">
            <ul class="pagination__list">
                <li class="pagination__item pagination__item--active"><a class="pagination__link" href="#!" aria-current="true" diasbled>1</a></li>
                <li class="pagination__item"><a class="pagination__link" href="#!">2</a></li>
                <li class="pagination__item"><a class="pagination__link" href="#!">3</a></li>
            </ul>
        </nav>
    </section>        
</main>        
			
<?php
get_footer();
