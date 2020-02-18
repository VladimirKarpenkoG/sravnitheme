<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Reacher89
 */

?>

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'reacher89' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :?>

			<p class="display-4"><?php esc_html_e( 'Мы не нашли ничего по этому запросу. Попробуйте найти что-то другое.', 'reacher89' ); ?></p>
			<?php else :?>
			<p class="display-4"><?php esc_html_e( 'Мы не нашли ничего по этому запросу. Попробуйте найти что-то другое.', 'reacher89' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
