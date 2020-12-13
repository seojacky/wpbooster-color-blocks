<?php
/**
 * Plugin Name: WP Booster: Color Blocks
 * Description: Gorgeous colored blocks for your posts. Do not reduce scores in the PageSpeed test.
 * Version: 1.1
 * Author: seojacky 
 * Author URI: https://t.me/big_jacky 
 * GitHub Plugin URI: https://github.com/seojacky/wpbooster-color-blocks
 * Text Domain: wpbooster-color-blocks
 * Domain Path: /languages
*/
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

define('WPBCB_FILE', __FILE__); // url of the file directory
define('WPBCB_DIR', __DIR__); // url plugins folder
/*
****************************************************************
	Plugin settings links
****************************************************************
*/
add_filter('plugin_action_links_'.plugin_basename(WPBCB_FILE), 'tlap_plugin_page_settings_link');
function tlap_plugin_page_settings_link( $links ) {
	/*$links[] = '<a href="' .
		admin_url( 'admin.php?page='. basename(dirname(WPBCB_FILE))) .
		'">' . __('Settings') . '</a>';*/
	$links[] = '<a href="https://t.me/big_jacky">' . __('Author') . '</a>';
	return $links;
}





add_action(
	'after_setup_theme',
	function() {
		add_editor_style( plugin_dir_url( __FILE__ ) . 'css/editor.css?' . filemtime( plugin_dir_path( __FILE__ ) . 'css/editor.css' ) );
	}
);

add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style( 'editor', plugin_dir_url( __FILE__ ) . 'css/editor.css', [], filemtime( plugin_dir_path( __FILE__ ) . 'css/editor.css' ) );
	}
);

/**
 * Добавить кнопку на панель TinyMCE.
 */
add_filter(
	'mce_buttons_2',
	function( $buttons ) {
	array_splice($buttons, 2, 0, 'styleselect'); // добавляем после 2го элемента
		return $buttons;
	},
	20
);

add_filter(
	'tiny_mce_before_init',
	function( $init_array ) {

		$style_formats = array(
			array(
				'title' => 'Blockquote',
				'block' => 'span',
				'classes' => 'wpbcb-block',
				'wrapper' => true,
			),
			array(
				'title' => 'Warning',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--warning',
				'wrapper' => true,
			),
			array(
				'title' => 'Question',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--question',
				'wrapper' => true,
			),
			array(
				'title' => 'Danger',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--danger',
				'wrapper' => true,
			),
			array(
				'title' => 'Check',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--check',
				'wrapper' => true,
			),
			array(
				'title' => 'Info',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--info',
				'wrapper' => true,
			),
			array(
				'title' => 'Thumbs Up',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--thumbs-up',
				'wrapper' => true,
			),
			array(
				'title' => 'Thumbs Down',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--thumbs-down',
				'wrapper' => true,
			),
		);

		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;
	}
);
