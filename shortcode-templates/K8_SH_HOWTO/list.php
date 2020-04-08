<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// echo '<pre>';
// print_r( get_defined_vars() );
// echo '</pre>';

if( is_array( $k8_acf_howto_stp ) && count( $k8_acf_howto_stp ) > 0 ) : ?>
	<?php if($k8_content) echo $k8_content; ?>
	<ul>
		<?php 
		$c = 1;
		foreach ($k8_acf_howto_stp as $item): ?>
            <li  
			<?php if(!is_feed()):?>
			id="howto_<?= $c ?>"
			<?php endif;?>
			>
            	<p><strong><?= $item['head']; ?></strong> <?= strip_tags($item['txt'], '<a>') ?></p>
				<p><?= Kd89Helper::getImgHtml([
							'img_id' => $item['img'],
							'size' => 'large']); ?></p>
            </li>
		<?php endforeach;?>
    </ul>    
<? endif; ?>
