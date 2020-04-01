<?php
/**
 * The template for displaying single review
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Reacher89
 */
/*
Template Name: Single page
*/
$accordions = get_field('k8_cmn_accordions');
get_header();
?>
	<main class="article-page">
    <article class="article">
      <header class="article__header">
        <div class="article__header-wrapper">
          <h1 class="article__title"><?= $post->post_title?></h1>
          <?php if(get_post_type() == 'k8pt_review'):
            $downloads = get_field('k8_cmn_dl');
            $terms = get_the_terms($post->ID,'k8tax_group');
            $comparison_url = get_term_link(get_field('k8_service_group_category', $terms[0]));?>
            <div class="article__buttons">
              <a class="btn btn--review" href="<?=$comparison_url?>?variant[]=<?=$post->ID?>">К сравнению!</a>
              <?php if($downloads):?>
              <a class="btn btn--green btn--download" href="<?=get_permalink($downloads)?>"><span class="btn__text">Скачать</span><i class="btn__ico fas fa-arrow-alt-circle-down"></i></a>
              <?php endif;?>
            </div>
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
      <div class="dropdown dropdown--theme_contents article__contents">
        <button class="btn dropdown__btn btn--sm" id="content-btn" aria-label="page content" aria-actions="content-list"><span><i class="mr-3 fas fa-list"></i>Содержание</span><i class="btn__ico fas fa-angle-down"></i></button>
        <ul class="dropdown__list" id="content-list" aria-labeledby="content-btn"></ul>
      </div>
      <section class="article__content">
        <?= the_content(); ?>
        <?php if(get_field('k8_cmn_display_fields')):?>
			<?php get_template_part( 'template-parts/review_data-block' );?>
        <?php endif; ?>
		<?php
			if($accordions):
        foreach($accordions as $accordion): 
        $id = uniqid();?>
          
					<h2 class="accordion__header" id="<?=$id?>">
					<button class="accordion__trigger" aria-expanded="true" aria-controls="<?=$id?>__content" id="<?=$id?>__btn">
						<span class="accordion__title"><?= $accordion['accordion_name']?></span>
						</button>
					</h2>
					<div class="accordion__panel" id="<?=$id?>__content" role="region" aria-labeledby="<?=$id?>__btn">
						<?= $accordion['accordion_content']?>

              <?php if($accordion["k8_cmn_inner_accordions"]):
                foreach($accordion["k8_cmn_inner_accordions"] as $inner_accordion):
                  $id = uniqid(); ?>
                <h3 class="accordion__header" id="<?=$id?>">
                <button class="accordion__trigger" aria-controls="<?=$id?>__content" id="<?=$id?>__btn">
                  <span class="accordion__title"><?= $inner_accordion['accordion_name']?></span>
                  </button>
                </h3>
                <div class="accordion__panel" id="<?=$id?>__content" role="region" aria-labeledby="<?=$id?>__btn">
                  <?= $inner_accordion['accordion_content']?>
                </div>
              <?php 
              endforeach;
            endif;?>

					</div>
		    <?php endforeach;	endif?>
      </section>

      <?php if(false):?>
        <div class="download"><a class="btn btn--green btn--download" href="javascript:void(0);"><span class="btn__text">Скачать</span><i class="btn__ico fas fa-arrow-alt-circle-down"></i></a><span class="download__size">Объем файла: 45мб</span></div>
      <?php endif;?>
    </article>
    <?php get_template_part( 'template-parts/recommend-block', 'recommend' );?>
    <?php get_template_part( 'template-parts/tags', 'tags' );?>
    <?php comments_template(); ?> 
  </main>
<?php
get_footer();
