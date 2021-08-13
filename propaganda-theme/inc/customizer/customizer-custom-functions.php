<?php

// Sanitize checkbox
function pt_sanitize_checkbox($checked)
{
    return ((isset($checked) && true == $checked) ? true : false);
}

// Sanitize radio
function pt_sanitize_radio($input, $setting)
{
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

// Sanitize select
function pt_sanitize_select($input, $setting)
{
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

// Sanitize textarea
function pt_sanitize_textarea($input)
{
    $allowed_html = array(
        'b' => array(),
        'br' => array(),
        'em' => array(),
        'i' => array(),
        'li' => array(
            'class' => array(),
        ),
        'small' => array(
            'data-tooltip' => array(),
        ),
        'span' => array(
            'class' => array(),
        ),
        'strong' => array(),
    );
    return wp_kses($input, $allowed_html);
}

// Sanitize URL
function pt_sanitize_url($input)
{
    if (strpos($input, ',') !== false) {
        $input = explode(',', $input);
    }
    if (is_array($input)) {
        foreach ($input as $key => $value) {
            $input[$key] = esc_url_raw($value);
        }
        $input = implode(',', $input);
    } else {
        $input = esc_url_raw($input);
    }
    return $input;
}

// Add colors to CSS
function pt_color_theme_css()
{
    $primary = get_theme_mod('primary_color', '#c1d4ff');
    $secondary = get_theme_mod('secondary_color', '#fc8686');
?>
    <style type="text/css" id="theme-option-css">
        :root {
            --primary: <?php echo $primary ?>;
            --secondary: <?php echo $secondary ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'pt_color_theme_css');
