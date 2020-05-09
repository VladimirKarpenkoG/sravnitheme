<div class="article__card-wrapper">
	<article class="article__card">
	<div class="article__card-content">
		<div class="article__card-top">
			<?= get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'article__card-img') ); ?>
			<div class="article__card-header">
				<h2 class="article__card-title"><a href="<?=get_permalink()?>"><?= the_title()?></a></h2>
			</div>
		</div>
		<p class="article__card-text">
		<?= strip_tags(get_the_content(),'<a>');?>
		</p>
	</div>
	<div class="article__card-controls">
		<div class="article__card-rating">
			<img class="article__card-rating-image" src="/wp-content/themes/sravnitheme/icons/rate-icon.svg" alt='<?= __('Комментарии'); ?>'>
			<span class="article__card-rating-count"><?= get_comments_number() ?></span>
		</div>
		<a class="btn article__card-link" href="<?=get_permalink()?>">Читать</a>
	</div>
	</article>
</div> 