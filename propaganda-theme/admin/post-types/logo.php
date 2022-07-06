<?php
// Register
$labels = array(
    'name'                => __('Logos', 'propaganda'),
    'singular_name'       => __('Logo', 'propaganda'),
    'menu_name'           => __('Logos', 'propaganda'),
    'name_admin_bar'      => __('Logos', 'propaganda'),
    'featured_image'        => __('Logo', 'propaganda'),
    'set_featured_image'    => __('Set Logo', 'propaganda'),
    'remove_featured_image' => __('Remove Logo', 'propaganda'),
    'use_featured_image'    => __('Use as Logo', 'propaganda'),
);
$args = array(
    'label'               => __('logo', 'propaganda'),
    'description'         => __('logos', 'propaganda'),
    'labels'              => $labels,
    'supports'            => array('title', 'thumbnail'),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 8,
    'menu_icon'           => 'dashicons-format-image',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'query_var'           => 'logo',
    'register_meta_box_cb' => 'pt_add_meta_boxes_logo',
);
register_post_type('logo', $args);

// Add metaboxes
function pt_add_meta_boxes_logo()
{
    add_meta_box(
        'pt_logo_url',
        __('Logo\'s URL', 'propaganda'),
        'pt_logo_url',
        'logo',
        'normal',
        'high'
    );
}

function pt_logo_url()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'logo_fields');
    $logo_url = get_post_meta($post->ID, 'logo_url', true);
?>
    <input type="url" name="logo_url" value="<?php echo esc_textarea($logo_url); ?>" placeholder="https://www.linkedin.com/in/alan-turing" class="widefat">
<?php
}

// Save metaboxes
function pt_save_meta_boxes_logo($post_id, $post)
{
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (!isset($_POST['logo_url']) || !wp_verify_nonce($_POST['logo_fields'], basename(__FILE__))) {
        return $post_id;
    }
    $events_meta['logo_url'] = esc_textarea($_POST['logo_url']);

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
add_action('save_post', 'pt_save_meta_boxes_logo', 1, 2);
