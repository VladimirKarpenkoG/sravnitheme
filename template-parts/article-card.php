<div class="article__card-wrapper">
	<article class="article__card">
	<div class="article__card-content">
		<?= get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'article__card-img') ); ?>
		<div class="article__card-header">
		<h2 class="article__card-title"><a href="<?=get_permalink()?>"><?= the_title()?></a></h2>
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