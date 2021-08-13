<?php

/**
 * Plugin Name: Propaganda Plugin
 * Plugin URI: https://thomaspericoi.com/projects/propaganda/
 * Description: The plugin that goes with the Propaganda theme. It's necessary to have all the content types, such as Clients, Projects, Testimonials etc.
 * Version: 1.0
 * Author: Thomas Pericoi
 * Author URI: https://thomaspericoi.com/
 */

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

// Register Post Types
function pt_register_post_types()
{
    // Clients
    $labels = array(
        'name'                => __('Clients', 'propaganda'),
        'singular_name'       => __('Client', 'propaganda'),
        'menu_name'           => __('Clients', 'propaganda'),
        'name_admin_bar'      => __('Clients', 'propaganda'),
        'view_item'           => __('View Client', 'propaganda'),
        'edit_item'           => __('Edit Client', 'propaganda'),
        'featured_image'        => __('Client\'s Logo', 'propaganda'),
        'set_featured_image'    => __('Set Client\'s Logo', 'propaganda'),
        'remove_featured_image' => __('Remove Client\'s Logo', 'propaganda'),
        'use_featured_image'    => __('Use as Client\'s Logo', 'propaganda'),
    );
    $args = array(
        'label'               => __('client', 'propaganda'),
        'description'         => __('clients', 'propaganda'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'comments'),
        'public'              => true,
        'rewrite'             => array('slug' => 'clients', 'with_front' => false),
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-money-alt',
        'query_var'           => 'client',
        'register_meta_box_cb' => 'pt_add_meta_boxes_client',
    );
    register_post_type('client', $args);

    // Projects
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

    // Testimonials
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
}
add_action('init', 'pt_register_post_types', 10);

// Client - Add metaboxes
function pt_add_meta_boxes_client()
{
    add_meta_box(
        'pt_client_url',
        __('Client\'s URL', 'propaganda'),
        'pt_client_url',
        'client',
        'normal',
        'high'
    );
    add_meta_box(
        'pt_client_date',
        __('Date', 'propaganda'),
        'pt_client_date',
        'client',
        'normal',
        'high'
    );
    add_meta_box(
        'pt_client_domains',
        __('Domains involved', 'propaganda'),
        'pt_client_domains',
        'client',
        'normal',
        'high'
    );
    add_meta_box(
        'pt_client_intro',
        __('Introduction', 'propaganda'),
        'pt_client_intro',
        'client',
        'normal',
        'high'
    );
}

function pt_client_url()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'client_fields');
    $client_url = get_post_meta($post->ID, 'client_url', true);
    echo '<input type="url" name="client_url" value="' . esc_textarea($client_url)  . '" placeholder="https://fr.wikipedia.org/" class="widefat">';
}

function pt_client_date()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'client_fields');
    $client_date = get_post_meta($post->ID, 'client_date', true);
    echo '<input type="text" name="client_date" value="' . esc_textarea($client_date)  . '" placeholder="Since 2020" class="widefat">';
}

function pt_client_domains()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'client_fields_repeater');
    $client_domains = get_post_meta($post->ID, 'client_domains', true);
?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#add-row').on('click', function() {
                var row = $('.empty-row.screen-reader-text').clone(true);
                row.removeClass('empty-row screen-reader-text');
                row.insertBefore('#client_domains tbody>tr:last');
                return false;
            });

            $('.remove-row').on('click', function() {
                $(this).parents('tr').remove();
                return false;
            });
        });
    </script>
    <table id="client_domains" width="100%">
        <thead>
            <tr>
                <th width="55%">Domain</th>
                <th width="35%">Font Awesome Icon Code</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($client_domains) :
                foreach ($client_domains as $field) {
            ?>
                    <tr>
                        <td width="55%">
                            <input type="text" name="domainLabel[]" value="<?php if ($field['domainLabel'] != '') echo esc_attr($field['domainLabel']); ?>" placeholder="Wordpress" class="widefat" />
                        </td>
                        <td width="35%">
                            <input type="text" name="domainIcon[]" value="<?php if ($field['domainIcon'] != '') echo esc_attr($field['domainIcon']); ?>" placeholder="fab fa-wordpress-simple" class="widefat" />
                        </td>
                        <td width="10%"><a class="button remove-row" href="#1">Remove</a></td>
                    </tr>
                <?php
                }
            else :
                ?>
                <tr>
                    <td>
                        <input type="text" title="Label" name="domainLabel[]" placeholder="Wordpress" class="widefat" />
                    </td>
                    <td>
                        <input type="text" title="Icon" name="domainIcon[]" placeholder="fab fa-wordpress-simple" class="widefat" />
                    </td>
                    <td><a class="button cmb-remove-row-button button-disabled" href="#">Remove</a></td>
                </tr>
            <?php endif; ?>
            <tr class="empty-row screen-reader-text">
                <td>
                    <input type="text" name="domainLabel[]" placeholder="Wordpress" class="widefat" />
                </td>
                <td>
                    <input type="text" name="domainIcon[]" placeholder="fab fa-wordpress-simple" class="widefat" />
                </td>
                <td><a class="button remove-row" href="#">Remove</a></td>
            </tr>
        </tbody>
    </table>
    <p><a id="add-row" class="button" href="#">Add another</a></p>
<?php
}

function pt_client_intro()
{
    global $post;
    wp_nonce_field(basename(__FILE__), 'client_fields');
    $client_intro = get_post_meta($post->ID, 'client_intro', true);
    echo '<textarea name="client_intro" class="widefat" rows="5">' . esc_textarea($client_intro) . '</textarea>';
}

// Client - Save metaboxes
function pt_save_meta_boxes_client($post_id, $post)
{
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (!isset($_POST['client_url']) || !isset($_POST['client_date']) || !isset($_POST['client_intro']) || !wp_verify_nonce($_POST['client_fields'], basename(__FILE__))) {
        return $post_id;
    }
    $events_meta['client_url'] = esc_textarea($_POST['client_url']);
    $events_meta['client_date'] = esc_textarea($_POST['client_date']);
    $events_meta['client_intro'] = esc_textarea($_POST['client_intro']);

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
add_action('save_post', 'pt_save_meta_boxes_client', 1, 2);

function pt_save_meta_boxes_client_domains($post_id)
{
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (!isset($_POST['client_fields_repeater']) || !wp_verify_nonce($_POST['client_fields_repeater'], basename(__FILE__))) {
        return $post_id;
    }

    $old = get_post_meta($post_id, 'client_domains', true);
    $new = array();
    $label = $_POST['domainLabel'];
    $icon = $_POST['domainIcon'];
    $count = count($label);

    for ($i = 0; $i < $count; $i++) {
        if ($label[$i] != '') :
            $new[$i]['domainLabel'] = esc_textarea($label[$i]);
            $new[$i]['domainIcon'] = esc_textarea($icon[$i]);
        endif;
    }
    if (!empty($new) && $new != $old) {
        update_post_meta($post_id, 'client_domains', $new);
    } elseif (empty($new) && $old) {
        delete_post_meta($post_id, 'client_domains', $old);
    }
}
add_action('save_post', 'pt_save_meta_boxes_client_domains');

// Project - Add metaboxes
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

// Project - Save metaboxes
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

// Testimonial - Add metaboxes
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

// Testimonial - Save metaboxes
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
