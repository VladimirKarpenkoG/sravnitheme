<?php
/**
 * The template for displaying single downloads
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Reacher89
 */
/*
Template Name: Single page for downloads
*/
$links = get_field('srv_dl_links');
get_header();?>
	<main class="article-page">
    <article class="article">
      <header class="article__header">
      <h1 class="article__title"><?= $post->post_title?></h1>
      </header>
        <section class="article__content">
            <div class="info info__table--theme-check">
            <?= the_content(); ?>
            </div>
            <div class="variant-list variant-list--downloads" style="padding-top: 30px;">
                <?php foreach($links as $link):?>
                <div class="variant-list__el"><a class="variant-opts" href="<?=$link['srv_dl_link']?>" rel="nofollow" target="_blank">
                    <div class="variant-opts__title"><?=$link['srv_dl_link_label']?></div><i class="btn__ico fas fa-arrow-alt-circle-down"></i></a>
                </div>
                <?php endforeach;?>
            </div>
        </section>
    </article>
    <?php get_template_part( 'template-parts/recommend-block', 'recommend' );?>
    <?php get_template_part( 'template-parts/tags', 'tags' );?>
  </main>
<?php
get_footer();
