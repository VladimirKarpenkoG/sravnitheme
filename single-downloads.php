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
        <div class="article__header-wrapper">
          <h1 class="article__title"><?= $post->post_title?></h1>
          <?php if(false):?>
            <div class="article__buttons"><a class="btn btn--review" href="javascript:void(0);">К сравнению!</a><a class="btn btn--green btn--download" href="javascript:void(0);"><span class="btn__text">Скачать</span><i class="btn__ico fas fa-arrow-alt-circle-down"></i></a></div>
          <?php endif;?>
        </div>

        <div class="article__header-img">
        <img src="<?= get_field('k8_cmn_illustration') ? wp_get_attachment_image_url( get_field('k8_cmn_illustration'), 'large' ): the_post_thumbnail_url('large') ?>" alt='Иллюстрация статьи "<?= $post->post_title?>"'>
        </div>

      </header>
      <div class="article__author"><img class="article__author-image" src="<?= get_avatar_url($post->post_author)?>" alt="Автор: <?= get_the_author('',false )?>">
        <div class="article__author-info">
          <div class="article__author-create">Опубликовано: 
            <time datetime="<?= get_the_date() ?>"><?= get_the_date() ?></time>
          </div>
          <hr class="article__author-hr">
          <div class="article__author-name">Автор: <?= get_the_author('',false )?></div>
        </div>
      </div>
        <section class="article__content" style="padding-top: 50px;">
        <?= the_content(); ?>
            <div class="variant-list variant-list--downloads">
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
