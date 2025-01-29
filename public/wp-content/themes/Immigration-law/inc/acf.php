<?php 

/*ACF*/

function my_acf_input_admin_footer() {
	
?>
<script type="text/javascript">
(function($) {
	
	acf.add_filter('color_picker_args', function( args, $field ){
	
		// do something to args
		args.palettes = ['#36ADE2', '#114350', '#DD231B', '#FF9D6D', '#FBD965', '#222426', '#ffffff']
		
		
		// return
		return args;
				
	});
	
})(jQuery);	
</script>
<?php
		
}

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

// 1. customize ACF path
if(!function_exists("my_acf_theme_settings_path")) {
	add_filter('acf/settings/path', 'my_acf_theme_settings_path');

 
	function my_acf_theme_settings_path( $path ) {
	 
	    // update path
	    $path = get_template_directory() . '/inc/acf/';
	    
	    // return
	    return $path;
	    
	}
}
	 

// 2. customize ACF dir
if(!function_exists("my_acf_theme_settings_dir")) {
	add_filter('acf/settings/dir', 'my_acf_theme_settings_dir');
	 
	function my_acf_theme_settings_dir( $dir ) {
	 
	    // update path
	    $dir = get_template_directory_uri() . '/inc/acf/';
	    
	    // return
	    return $dir;
	    
	}
}
 

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', 'my_acf_show_admin');
function my_acf_show_admin($show) {
	// provide a list of usernames who can edit custom field definitions here
	$admins = array( 
		'master'
	);

	// get the current user
	$current_user = wp_get_current_user();

	return (in_array($current_user->user_login, $admins));
}


// 4. Include ACF
include_once( get_template_directory() . '/inc/acf/acf.php' );


// 5. Create options page
if( function_exists('acf_add_options_page') ) {
	$page = acf_add_options_page(array(
		'page_title' 	=> 'Global Elements',
		'menu_title' 	=> 'Global',
		'menu_slug' 	=> 'global-elements',
		'capability' 	=> 'edit_posts',
		'position' 		=> 40,
		'redirect' 		=> false
	));
}


// 6. Making dashboard icons
function add_menu_icons_styles2(){
?>

<style>
#adminmenu #menu-posts-gallery div.wp-menu-image:before { content: "\f306"; }
#adminmenu .toplevel_page_global-elements div.wp-menu-image:before { content: "\f319"; }
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles2' );

?>