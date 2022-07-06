<?php

/* INCLUDES
--------------------------------------------------------------- */

// Include Post types
function register_custom_post_types()
{
    $post_types = [
        "client",
        "documentation",
        "logo",
        "project",
        "testimonial",
    ];

    foreach ($post_types as $post_type) {
        include_once('post-types/' . $post_type . '.php');
    }
}
add_action('init', 'register_custom_post_types');

// Include Customizer
include_once('customizer/customizer.php');


/* PAGE
--------------------------------------------------------------- */

// Page - Add metaboxes
function pt_add_meta_boxes_page()
{
    add_meta_box(
        'pt_page_subtitle',
        __('Subtitle (h1)', 'propaganda'),
        'pt_page_subtitle',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'pt_add_meta_boxes_page');

function pt_page_subtitle()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'page_fields');
    $page_subtitle = get_post_meta($post->ID, 'page_subtitle', true);
?>
    <input type="text" name="page_subtitle" value="<?php echo esc_textarea($page_subtitle); ?>" placeholder="<?php echo __('Privacy Policies', 'propaganda'); ?>" class="widefat">
<?php
}

// Page - Save metaboxes
function pt_save_meta_boxes_page($post_id, $post)
{
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (!isset($_POST['page_subtitle']) || !wp_verify_nonce($_POST['page_fields'], basename(__FILE__))) {
        return $post_id;
    }
    $events_meta['page_subtitle'] = esc_textarea($_POST['page_subtitle']);

    foreach ($events_meta as $key => $value) :
        if ('revision' === $post->post_type) {
            return;
        }
        if (get_post_meta($post_id, $key, false)) {
            update_post_meta($post_id, $key, $value);
        } else {
            add_post_meta($post_id, $key, $value);
        }
        if (!$value) {
            delete_post_meta($post_id, $key);
        }

    endforeach;
}
add_action('save_post', 'pt_save_meta_boxes_page', 1, 2);
