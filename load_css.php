<?php
# FRONT END
function pbo_load_css()
{   
    #CORE CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/core/plugins/bootstrap/css/bootstrap.min.css', array());     
    wp_enqueue_style('customCSS', get_template_directory_uri() . '/assets/css/style.css', array()); 
}

add_action('wp_enqueue_scripts', 'pbo_load_css');

# BACK END
function admin_css()
{
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/core/assets/css/style_admin.css', array());
}

add_action('admin_enqueue_scripts', 'admin_css');

function login_css()
{
    wp_enqueue_style('login_css', get_template_directory_uri().'/core/assets/css/style_login.css');
}
add_action('login_enqueue_scripts', 'login_css');
