<?php
function register_acf_blocks() {
	if (function_exists('register_block_type')) {
		register_block_type(get_template_directory() . '/blocks/block-hero');
	}
}
add_action('init', 'register_acf_blocks');

?>