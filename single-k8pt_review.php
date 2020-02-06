<?php
/**
 * The template for displaying single review
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Reacher89
 */
/*
Template Name: Review page layout
Template Post Type: review
*/
$accordions = get_field('k8_cmn_accordions');
$tarrifs = get_field('k8_cmn_prc');
get_header();
?>
	<main class="article-page">
    <article class="article">
      <header class="article__header">
        <div class="article__header-wrapper">
          <h1 class="article__title"><?= $post->post_title?></h1>
          <?php if(false):?>
            <div class="article__buttons"><a class="btn btn--review" href="javascript:void(0);">К сравнению!</a><a class="btn btn--green btn--download" href="javascript:void(0);"><span class="btn__text">Скачать</span><i class="btn__ico fas fa-arrow-alt-circle-down"></i></a></div>
          <?php endif;?>
        </div>
        <div class="article__header-img"><img src="<?= the_post_thumbnail_url('medium');?>"></div>
      </header>
      <div class="article__author"><img class="article__author-image" src="<?= get_avatar_url($post->post_author)?>">
        <div class="article__author-info">
          <div class="article__author-create">Опубликовано: 
            <time datetime="<?= get_the_date() ?>"><?= get_the_date() ?></time>
          </div>
          <hr class="article__author-hr">
          <div class="article__author-name">Автор: <?= the_author('',false )?></div>
        </div>
      </div>
      <div class="dropdown dropdown--theme_contents article__contents">
        <button class="btn dropdown__btn btn--sm" id="content-btn" aria-label="page content" aria-actions="content-list"><span><i class="mr-3 fas fa-list"></i>Содержание</span><i class="btn__ico fas fa-angle-down"></i></button>
        <ul class="dropdown__list" id="content-list" aria-labeledby="content-btn"></ul>
      </div>
      <section class="article__content">
        <?= the_content(); ?>
        <?php if(false):?>
        <div class="article__info">
          <div class="row gutter-lg">
            <div class="col-12 col-lg-8">
              <div class="info info__table info__table--theme-main">
                <div class="info__row">
                  <div class="info__key">Бесплатная версия</div>
                  <div class="info__value">Есть</div>
                </div>
                <div class="info__row">
                  <div class="info__key">Поддерживаемые языки</div>
                  <div class="info__value">Русский, английский и ещё 70</div>
                </div>
                <div class="info__row">
                  <div class="info__key">Собственное доменное имя</div>
                  <div class="info__value">Платная функция</div>
                </div>
                <div class="info__row">
                  <div class="info__key">Объём почтового ящика для бесплатной версии</div>
                  <div class="info__value">15 Гб</div>
                </div>
                <div class="info__row">
                  <div class="info__key">Максимальный объём прикрепляемых файлов</div>
                  <div class="info__value">25 Мб</div>
                </div>
                <div class="info__row">
                  <div class="info__key">Время до блокировки аккаунта при длительном бездействии</div>
                  <div class="info__value">9 месяцев</div>
                </div>
                <div class="info__row">
                  <div class="info__key">Приложения для операционных систем</div>
                  <div class="info__value">Android, iOS</div>
                </div>
                <div class="info__row">
                  <div class="info__key">Меры защиты</div>
                  <div class="info__value">S/MIME, PFS, RSA-2048, HTTPS</div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="row gutter-lg">
                <?php if($tarrifs):?>
                <div class="col-12 col-sm-6 col-lg-12">
                  <div class="info info__list">
                    <div class="info__title">Тарифы</div>
					          <?php foreach($tarrifs as $tariff):?>
                    	<div class="info__value"><?php echo $tariff['tarif_name'] . ' - ' . $tariff["curr"]["label"] . $tariff['amount_money']. '/месяц'?></div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <?php endif;?>
                <!-- Mail block -->
                <div class="col-12 col-sm-6 col-lg-12">
                  <div class="info info__table info__table--theme-check">
                   
                    <div class="info__row">
                      <div class="info__key">Outlook</div>
                      <div class="info__value"><i class="fas fa-check"></i></div>
                    </div>
                  
                  </div>
                </div>
                <!-- END MAIL BLOCK -->
              </div>
            </div>
          </div>
        </div>
        <?php endif;?>
	
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
  </main>
<?php
get_footer();
