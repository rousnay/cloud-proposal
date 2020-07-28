<?php
/**
 * Remove capabilities from editors.
 *
 * Call the function when your plugin/theme is activated.
 */
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