<?php
// Register
$labels = array(
    'name'                => __('Testimonials', 'propaganda'),
    'singular_name'       => __('Testimonial', 'propaganda'),
    'menu_name'           => __('Testimonials', 'propaganda'),
    'name_admin_bar'      => __('Testimonials', 'propaganda'),
    'featured_image'        => __('Profile Picture', 'propaganda'),
    'set_featured_image'    => __('Set Profile Picture', 'propaganda'),
    'remove_featured_image' => __('Remove Profile Picture', 'propaganda'),
    'use_featured_image'    => __('Use as Profile Picture', 'propaganda'),
);
$args = array(
    'label'               => __('testimonial', 'propaganda'),
    'description'         => __('Testimonials', 'propaganda'),
    'labels'              => $labels,
    'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 6,
    'menu_icon'           => 'dashicons-testimonial',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'query_var'           => 'testimonial',
    'register_meta_box_cb' => 'pt_add_meta_boxes_testimonial',
);
register_post_type('testimonial', $args);

// Add metaboxes
function pt_add_meta_boxes_testimonial()
{
    add_meta_box(
        'pt_testimonial_position',
        __('Position in the company', 'propaganda'),
        'pt_testimonial_position',
        'testimonial',
        'normal',
        'high'
    );
    add_meta_box(
        'pt_testimonial_url',
        __('Profile\'s URL', 'propaganda'),
        'pt_testimonial_url',
        'testimonial',
        'normal',
        'high'
    );
}

function pt_testimonial_position()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'testimonial_fields');
    $testimonial_position = get_post_meta($post->ID, 'testimonial_position', true);
?>
    <input type="text" name="testimonial_position" value="<?php echo esc_textarea($testimonial_position); ?>" placeholder="<?php echo __('Deputy Director of Manchester University Computing Laboratory', 'propaganda'); ?>" class="widefat">
<?php
}

function pt_testimonial_url()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'testimonial_fields');
    $testimonial_url = get_post_meta($post->ID, 'testimonial_url', true);
?>
    <input type="url" name="testimonial_url" value="<?php echo esc_textarea($testimonial_url); ?>" placeholder="https://www.linkedin.com/in/alan-turing" class="widefat">
<?php
}

// Save metaboxes
function pt_save_meta_boxes_testimonial($post_id, $post)
{
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (!isset($_POST['testimonial_position']) || !isset($_POST['testimonial_url']) || !wp_verify_nonce($_POST['testimonial_fields'], basename(__FILE__))) {
        return $post_id;
    }
    $events_meta['testimonial_position'] = esc_textarea($_POST['testimonial_position']);
    $events_meta['testimonial_url'] = esc_textarea($_POST['testimonial_url']);

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
add_action('save_post', 'pt_save_meta_boxes_testimonial', 1, 2);
