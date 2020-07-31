<?php

/************************************************
 * programmatically set default role for new users
************************************************/
add_filter('pre_option_default_role', function($default_role){
    return 'editor'; 
    return $default_role; //
});


/*********************************
 * Remove capabilities from editors
**********************************/
function wpcodex_set_capabilities() {

    // Get the role object.
    $editor = get_role( 'editor' );

    // A list of capabilities to remove from editors.
    $caps = array(
        'delete_others_posts',
        'edit_others_posts',
    );

    foreach ( $caps as $cap ) {

        // Remove the capability.
        $editor->remove_cap( $cap );
    }
}
add_action( 'init', 'wpcodex_set_capabilities' );


/***********************************************
 * Set default color scheme on user registation
***********************************************/
function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'midnight'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');


/***********************************
 * User profile field customization
************************************/
if ( !current_user_can( 'administrator' ) ){
    add_action( 'personal_options', 'user_profile_options' );
    // remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
}

function user_profile_options() {
  ?>
    <script type="text/javascript">
        jQuery( document ).ready(function( $ ){

            // Field modification
            $('h2:contains("Personal Options")').html("Personal Profile");

            $('input#admin_color_midnight').prop('checked', true);

            $('.acf-field .acf-label label').css('font-weight', '600');

            // hide options
            $( '#your-profile h3:first, h2:contains("Name"), h2:contains("About Yourself"), h2:contains("Contact Info"), h2:contains("Account Management"), .user-url-wrap, .user-description-wrap, .user-profile-picture').remove();

            $( '#your-profile .form-table:first').hide();
        } );
    </script>
  <?php
}
