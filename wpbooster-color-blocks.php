<?php
/**
 * Plugin Name: WP Booster: Color Blocks
 * Version: 1.1
 */
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
