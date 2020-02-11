<?php

function pbo_load_js()
{   
    wp_enqueue_script('loadingJS', get_template_directory_uri() . '/core/components/loading/loading.js', 1, false);
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/b3090bb5e1.js', array(), 1, false);

    wp_enqueue_script('popper', 'https://unpkg.com/@popperjs/core@^2.0.0', array('jquery'), 1, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/core/plugins/bootstrap/js/bootstrap.min.js', array('jquery'), 1, true);  

    wp_enqueue_script('owlCarousel', get_template_directory_uri() . '/core/plugins/owlCarosuel/owl.carousel.min.js', array('jquery'), 1, true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/core/plugins/wow/js/wow.min.js', array('jquery'), 1, true);   

    wp_enqueue_script('jQueryMask', get_template_directory_uri() . '/core/plugins/jquery-mask/jquery.mask.min.js', array('jquery'), 1, true);    
    
    # Custom JS
    wp_enqueue_script('global', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), 1, true);
    wp_enqueue_script('header', get_template_directory_uri() . '/components/header/header.js', array('jquery'), 1, true);
}

add_action('wp_enqueue_scripts', 'pbo_load_js');
