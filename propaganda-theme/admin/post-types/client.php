<?php
// Register
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

// Add metaboxes
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
    echo '<textarea name="client_intro" class="widefat" rows="5">' . $client_intro . '</textarea>';
}

// Save metaboxes
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
    $events_meta['client_intro'] = $_POST['client_intro'];

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
