<?php
    $post_tags = wp_get_post_tags($post->ID);
    if (!empty($post_tags)):?>
        <ul class="badge__list badge__list--tags justify-content-center">
        <?php foreach ($post_tags as $tag):?>
            <li class="badge__col"><a class="badge__item" href="<?=get_tag_link($tag->term_id)?>"><?=$tag->name?></a></li>
        <?php endforeach ?>
        </ul>

    <?php endif;
