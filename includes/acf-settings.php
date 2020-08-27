<?php 

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false; 
}


// Save ACF field as JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/includes/acf-json';
    
    
    // return
    return $path;
    
}


// Load ACF field from JSON

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/includes/acf-json';
    
    
    // return
    return $paths;
    
}



//Add thumbnail to the post search in post object ACF field

/*

function my_acf_load_field( $field )
{
    global $post;
    $field['slide_template'] = array();
    wp_reset_query();
    $query = new WP_Query(array(
        'post_type' => 'master_slides',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => -1,
        ));
    foreach($query->posts as $product_id=>$macthed_product){
            $choices[$macthed_product->ID] = $macthed_product->post_title;
    }
    $field['slide_template'] = array();

    if( is_array($slide_template) )
    {
        foreach( $choices as $key=>$choice )
        {
            $field['slide_template'][$key] = $choice;
        }
    }
     wp_reset_query();
    return $field;
}
add_filter('acf/load_field/name=slide_template', 'my_acf_load_field');






function my_acf_field_checkbox( $field ){
	
	global $wpdb;
	$querystr = "SELECT * FROM '$wpdb->posts' WHERE 'post_type' = 'master_slides'";
	$my_cpts = $wpdb->get_results($querystr, OBJECT);

	if($my_cpts){
		$my_cpt_arr = array();
		foreach($my_cpts as $my_cpt):
			$my_cpt_arr[$my_cpt->ID] = $my_cpt->post_title;
		endforeach;
	}
	$field['read_more_text'] = $my_cpt_arr;

	return $field;
};

add_filter('acf/load_field/name=slide_template', 'my_acf_field_checkbox');

*/





add_filter('acf/fields/post_object/result', 'my_acf_fields_post_object_result', 10, 4);
function my_acf_fields_post_object_result( $text, $post, $field, $post_id ) {

	$post_thumbnail_url = get_the_post_thumbnail_url($post->ID);
	$post_title = get_the_title($post->ID);
	$post_link = get_permalink($post->ID);

	$avatar = ' <a target="blank" class="slide_preview" href="'.$post_link.'">Preview</a><br><div class="post_ava_prefilter_wrapper">';
	$avatar .= '<div class="ava_prefilter_wrapper"><img width="150" class="ava_square" src="'.$post_thumbnail_url.'" /></div>';
	$avatar .= '</div>';

    $text .=  $avatar ;

    return $text;
}




/*****
 Options Page
***************/
/*
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Lighthouse General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'lighthouse-general-settings',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> '',
		'redirect'		=> false,
		'icon_url' => 'dashicons-layout'
		));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Announcement Slider',
		'menu_title'	=> 'Announcement',
		'menu_slug' 	=> 'announcement-slider',
		'parent_slug'	=> 'lighthouse-general-settings',
		));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Members Logo Slider',
		'menu_title'	=> 'Members Logo',
		'menu_slug' 	=> 'members-logo-slider',
		'parent_slug'	=> 'lighthouse-general-settings',
		));
}
*/