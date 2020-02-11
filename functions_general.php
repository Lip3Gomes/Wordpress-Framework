<?php

//Menu lateral Configurações do tema
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Configurações',
    'menu_title'  => 'Configurações do Tema',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'icon_url'      => get_template_directory_uri() . '/core/assets/img/favicon.png',
    'position'      => '1000',
    'redirect'    => false
  ));
}

function pbo_settings_theme()
{

  register_nav_menus(array(
    'primary' => __('Cabeçalho', 'CiaWebsites'),
    'secondary' => __('Footer', 'CiaWebsites'),
  ));
}
add_action('init', 'pbo_settings_theme');

include get_template_directory() . '/core/functions/pagination-bootstrap.php';

# Funcoes do PBO Framework
require_once(get_template_directory() . '/functions/slide.php');
require_once(get_template_directory() . '/functions/produtos.php');
require_once(get_template_directory() . '/functions/conceitos.php');
require_once(get_template_directory() . '/functions/clientes.php');
require_once(get_template_directory() . '/functions/paginacao.php');

// Enable post thumbnails
add_theme_support('post-thumbnails');

// Custom image sizes
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'logo', 250, 400, true );

}
