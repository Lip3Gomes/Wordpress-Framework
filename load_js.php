<?php

function pbo_load_js()

{   wp_enqueue_script('globalUtils', get_template_directory_uri() . '/core/assets/js/utilsFramework.js', array('jquery'), 1, false);
    
    # Fontawesome
    wp_enqueue_script('loadingJS', get_template_directory_uri() . '/core/components/loading/loading.js', 1, false);      
    

    
}

add_action('wp_enqueue_scripts', 'pbo_load_js');
