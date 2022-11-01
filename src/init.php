<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package everise
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @since 1.0.0
 */
function everise_block_assets() {
	// Styles.
	wp_enqueue_style( 'everise-style-css', plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ) );
	wp_enqueue_style('font-awesome', plugins_url( 'lib/css/fontawesome.min.css', dirname( __FILE__ ) ) );
	wp_enqueue_style('slick-style', plugins_url( 'lib/css/slick.css', dirname( __FILE__ ) ) );
	wp_enqueue_style('slick-theme-style', plugins_url( 'lib/css/slick-theme.css', dirname( __FILE__ ) ) );
	wp_enqueue_script('slick-script',  plugins_url( 'lib/js/slick.min.js', dirname( __FILE__ ) ), array('jquery'));
	wp_enqueue_script('slick-main-script',  plugins_url( 'lib/js/main.js', dirname( __FILE__ ) ), array('jquery'));
} 

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'everise_block_assets' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function everise_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'everise-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		// filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Styles.
	wp_enqueue_style(
		'everise-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
		// filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: filemtime — Gets file modification time.
	);
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'everise_editor_assets' );
