 <!-- recommend block -->
<?php
    if(is_page()) return false;
    //Sort post in categories by default
    $categories = get_the_category($post->ID);
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    //But if this is review, then sort by taxonomy
    $tax_query = null;
    if($post->post_type == 'k8pt_review') {
      $postterms = get_the_terms($post->ID,'k8tax_group');
      $tax_query =[[
          'taxonomy' => 'k8tax_group',
          'field'    => 'term_id',
          'terms'    => $postterms[0]->term_id,
        ]];
    }

    if($post->post_type == 'downloads') {
      $postterms = get_the_terms($post->ID,'k8dl_group');
      $tax_query =[[
          'taxonomy' => 'k8dl_group',
          'field'    => 'term_id',
          'terms'    => $postterms[0]->term_id,
        ]];
    }


    $args=array(
    'post_type' => $post->post_type,
    'post__not_in' => array($post->ID),
    'category__in' => $category_ids,
    'showposts'=>3,
    'orderby'=> 'rand',
    'ignore_sticky_posts'=>1,
    'tax_query' => $tax_query
);
    $recommend = new wp_query($args);
    if($recommend->have_posts()): ?>
 <section class="article__recommend">
      <h3 class="article__recommend-title">Вам также могут быть интересны эти статьи:</h3>
      <div class="article-list">
        <?php while($recommend->have_posts()): $recommend->the_post();?>
          <?php get_template_part( 'template-parts/article-card', 'article-card' );?>		
        <?endwhile;?>
        <? wp_reset_query();?>
      </div>
    </section>
<?php endif;?>
    <!-- End recommend block -->