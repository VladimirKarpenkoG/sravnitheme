<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// echo '<pre>';
// print_r( get_defined_vars() );
// echo '</pre>';

if( is_array( $k8_acf_howto_stp ) && count( $k8_acf_howto_stp ) > 0 ) : ?>
	<ul>
		<?php 
		$c = 1;
		foreach ($k8_acf_howto_stp as $item): ?>
            <li>
            <span><?= $item['head']; ?></span>
            </li>
			</div><!-- .k8howto__item -->
		<?php endforeach;?>
    </ul>    
<? endif; ?>
