<?php
# FRONT END
function pbo_load_css()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/core/plugins/bootstrap/css/bootstrap.min.css', array());
    wp_enqueue_style('animateCSS', get_template_directory_uri() . '/core/plugins/animateCSS/animate.min.css', array());
    
    
    wp_enqueue_style('customCSS', get_template_directory_uri() . '/assets/css/style.css', array()); 
    # wp_enqueue_style('owlCSS', get_template_directory_uri() . '/core/plugins/owlCarosuel/assets/owl.carousel.min.css', array());
}

add_action('wp_enqueue_scripts', 'pbo_load_css');

# BACK END

function pbo_load_admin_css()
{
    wp_enqueue_style('pbo_style_admin', get_template_directory_uri() . '/core/assets/css/style.css', array());
}

add_action('admin_enqueue_scripts', 'pbo_load_admin_css');
