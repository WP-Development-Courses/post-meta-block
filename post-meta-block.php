<?php
/**
 * Plugin Name:       WPDC Post Meta Example Block
 * Plugin URI:        https://wpdevelopment.courses/
 * Update URI:        false
 * Description:       An example block to display post meta in the block editor.
 * Requires at least: 6.1
 * Requires PHP:      8.0
 * Version:           0.1.0
 * Author:            Fränk Klein (WP Development Courses)
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Register the block.
 */
function wpdc_post_meta_example_block_init() {
	register_block_type(
		__DIR__ . '/build',
		array(
			'render_callback' => 'wpdc_post_meta_example_block_render',
		)
	);
}
add_action( 'init', 'wpdc_post_meta_example_block_init' );

/**
 * Renders the post meta block in the editor, and on the frontend.
 *
 * @param  array    $attributes Block attributes.
 * @param  string   $content    Block default content.
 * @param  WP_Block $block      Block instance.
 *
 * @return string Block HTML.
 */
function wpdc_post_meta_example_block_render( $attributes, $content, $block ) {
	if ( empty( $block->context['postId'] ) ) {
		return '';
	}
	ob_start();
	?>

	<div <?php echo get_block_wrapper_attributes(); ?>>
		<?php echo esc_html( get_post_meta( $block->context['postId'], 'your-meta-key', true ) ); ?>
	</div>
	<?php

	return ob_get_clean();
}
