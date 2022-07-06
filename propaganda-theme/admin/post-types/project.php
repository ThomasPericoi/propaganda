<?php
// Register
$labels = array(
    'name'                => __('Projects', 'propaganda'),
    'singular_name'       => __('Project', 'propaganda'),
    'menu_name'           => __('Projects', 'propaganda'),
    'name_admin_bar'      => __('Projects', 'propaganda'),
    'view_item'           => __('View Project', 'propaganda'),
    'edit_item'           => __('Edit Project', 'propaganda'),
    'featured_image'        => __('Project Logo', 'propaganda'),
    'set_featured_image'    => __('Set Project Logo', 'propaganda'),
    'remove_featured_image' => __('Remove Projects Logo', 'propaganda'),
    'use_featured_image'    => __('Use as Project Logo', 'propaganda'),
);
$args = array(
    'label'               => __('project', 'propaganda'),
    'description'         => __('projects', 'propaganda'),
    'labels'              => $labels,
    'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'comments'),
    'public'              => true,
    'has_archive'         => true,
    'rewrite'             => array('slug' => 'projects', 'with_front' => false),
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-paperclip',
    'query_var'           => 'project',
    'register_meta_box_cb' => 'pt_add_meta_boxes_project',
);
register_post_type('project', $args);

// Add metaboxes
function pt_add_meta_boxes_project()
{
    add_meta_box(
        'pt_project_url',
        __('Project URL', 'propaganda'),
        'pt_project_url',
        'project',
        'normal',
        'high'
    );
    add_meta_box(
        'pt_project_date',
        __('Date', 'propaganda'),
        'pt_project_date',
        'project',
        'normal',
        'high'
    );
    add_meta_box(
        'pt_project_icon',
        __('Project Icon', 'propaganda'),
        'pt_project_icon',
        'project',
        'normal',
        'high'
    );
    add_meta_box(
        'pt_project_intro',
        __('Introduction', 'propaganda'),
        'pt_project_intro',
        'project',
        'normal',
        'high'
    );
}

function pt_project_url()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'project_fields');
    $project_url = get_post_meta($post->ID, 'project_url', true);
    echo '<input type="url" name="project_url" value="' . esc_textarea($project_url)  . '" placeholder="https://github.com/" class="widefat">';
}

function pt_project_date()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'project_fields');
    $project_date = get_post_meta($post->ID, 'project_date', true);
    echo '<input type="text" name="project_date" value="' . esc_textarea($project_date)  . '" placeholder="Made in 2018" class="widefat">';
}

function pt_project_icon()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'project_fields');
    $project_label = get_post_meta($post->ID, 'project_label', true);
    $project_icon = get_post_meta($post->ID, 'project_icon', true);
?>
    <p class="meta-options">
        <label for="project_label"><?php echo __('Tooltip - Text', 'propaganda'); ?></label>
        <input type="text" name="project_label" value="<?php echo esc_textarea($project_label); ?>" placeholder="<?php echo __('A super website that gives joy to the viewer.', 'propaganda'); ?>" class="widefat">
    </p>
    <p class="meta-options">
        <label for="project_icon"><?php echo __('Tooltip - Font Awesome Icon Code', 'propaganda'); ?></label>
        <input type="text" name="project_icon" value="<?php echo esc_textarea($project_icon); ?>" placeholder="fas fa-store" class="widefat">
    </p>
<?php
}

function pt_project_intro()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'project_fields');
    $project_intro = get_post_meta($post->ID, 'project_intro', true);
    echo '<textarea name="project_intro" class="widefat" rows="5">' . esc_textarea($project_intro) . '</textarea>';
}

// Save metaboxes
function pt_save_meta_boxes_project($post_id, $post)
{
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (!isset($_POST['project_url']) || !isset($_POST['project_date']) || !isset($_POST['project_label']) || !isset($_POST['project_icon']) || !isset($_POST['project_intro']) || !wp_verify_nonce($_POST['project_fields'], basename(__FILE__))) {
        return $post_id;
    }
    $events_meta['project_url'] = esc_textarea($_POST['project_url']);
    $events_meta['project_date'] = esc_textarea($_POST['project_date']);
    $events_meta['project_label'] = esc_textarea($_POST['project_label']);
    $events_meta['project_icon'] = esc_textarea($_POST['project_icon']);
    $events_meta['project_intro'] = esc_textarea($_POST['project_intro']);

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
add_action('save_post', 'pt_save_meta_boxes_project', 1, 2);
