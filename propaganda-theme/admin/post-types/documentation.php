<?php
// Register
$labels = array(
    'name'                => __('Documentations', 'propaganda'),
    'singular_name'       => __('Documentation', 'propaganda'),
    'menu_name'           => __('Documentations', 'propaganda'),
    'name_admin_bar'      => __('Documentations', 'propaganda'),
    'view_item'           => __('View Documentation', 'propaganda'),
    'edit_item'           => __('Edit Documentation', 'propaganda'),
);
$args = array(
    'label'               => __('documentation', 'propaganda'),
    'description'         => __('documentations', 'propaganda'),
    'labels'              => $labels,
    'supports'            => array('title', 'editor', 'revisions'),
    'public'              => true,
    'rewrite'             => array('slug' => 'documentations', 'with_front' => false),
    'menu_position'       => 7,
    'menu_icon'           => 'dashicons-info-outline',
    'show_in_rest' => true,
);
register_post_type('documentation', $args);
