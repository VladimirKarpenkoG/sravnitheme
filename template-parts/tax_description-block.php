<?php
	$description_content = null;
	$term = get_queried_object();
	if(! term_description()) {
		$parent = get_category($term->parent);
		$description_content = $parent->description;
	} else $description_content = term_description();

	if($term->taxonomy == 'k8tax_group' ) {
		$description_content = get_post_type_object( 'k8pt_review' )->description;
	} 
	
	if($term->taxonomy == 'k8dl_group' ) {
		$description_content = get_post_type_object( 'downloads' )->description;
	} 
		
	if($description_content):?>  
		<blockquote class="message message--quote message--description">
			<?= strip_tags($description_content, '<a>')?>
      	</blockquote>
<?php endif;  