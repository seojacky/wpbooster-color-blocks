<?php
/**
 * Plugin Name: WP Booster: Color Blocks
 * Description: Gorgeous colored blocks for your posts. Do not reduce scores in the PageSpeed test.
 * Version: 1.5
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
add_filter('plugin_action_links_'.plugin_basename(WPBCB_FILE), 'wpbcb_plugin_page_settings_link');
function wpbcb_plugin_page_settings_link( $links ) {
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
		wp_enqueue_style( 'wpbcb-editor-css', plugin_dir_url( __FILE__ ) . 'css/editor.css', [], filemtime( plugin_dir_path( __FILE__ ) . 'css/editor.css' ) );
	}
);

/**
 * Добавить кнопку на панель TinyMCE.
 */
function wpbcb_info_buttons($buttons) {
	array_splice($buttons, 2, 0, 'styleselect'); // добавляем после 2го элемента
	return $buttons;
}
add_filter('mce_buttons_2', 'wpbcb_info_buttons', 11);
 
add_filter( 'tiny_mce_before_init', 'wpbcb_mce_before_init_insert_formats' );
function wpbcb_mce_before_init_insert_formats( $init_array ) {

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
			array(
				'title' => 'Thumbs Up Emoji',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--thumbs-up-emoji',
				'wrapper' => true,
			),
			array(
				'title' => 'Thumbs Down Emoji',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--thumbs-down-emoji',
				'wrapper' => true,
			),
			array(
				'title' => 'Idea Emoji',
				'block' => 'span',
				'classes' => 'wpbcb-block wpbcb-block--thumbs-idea-emoji',
				'wrapper' => true,
			),
		);

		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;
	}


/* PageSpeed optimization */
add_filter( 'style_loader_tag', 'wpb_color_blocks_change_attribute', 10, 2 );
function wpb_color_blocks_change_attribute($link, $handle) {	

	  if( $handle === 'wpbcb-editor-css' ) {
        $link = str_replace( '\'all\'', '\'print\'', $link );
		$link = str_replace( '/>', 'onload="this.media=\'all\'" />', $link );
    }
    return $link;
}
