 <!-- recommend block -->
<?php
    	
    $postterms = get_the_terms( get_the_ID(),'k8tax_group');
    $args=array(
    'post_type' => $post->post_type,
    'post__not_in' => array($post->ID),
    'showposts'=>3,
    'orderby'=> 'rand',
    'caller_get_posts'=>1,
    'tax_query' => array(
      array(
          'taxonomy' => 'k8tax_group',
          'field'    => 'term_id',
          'terms'    => $postterms[0]->term_id,
      ),
  ),);
    $recommend = new wp_query($args);
    if($recommend->have_posts()): ?>
 <section class="article__recommend">
      <h3 class="article__recommend-title">Вам также могут быть интересны эти статьи:</h3>
      <div class="article-list">
        <?php while($recommend->have_posts()): $recommend->the_post();?>
        <div class="article__card-wrapper">
          <article class="article__card">
            <div class="article__card-content">
            <?= get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'article__card-img') ); ?>
            <div class="article__card-header">
            <h2 class="article__card-title"><a href="<?=get_permalink()?>"><?= the_title()?></a></h2>
            <author class="article__card-author"><a href="javascript:void(0);">Автор: <?= the_author('',false )?></a></author>
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
        <?endwhile;?>
      </div>
    </section>
<?php endif;?>
    <!-- End recommend block -->