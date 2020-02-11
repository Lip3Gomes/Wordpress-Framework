<?php 

add_action('init', 'myStartSession', 1);
function myStartSession()
{
  if (!session_id()) {
    session_start();
  }
}


# Adicionando menus ao menu principal do painel adiminstrativo
function admin_bar_item(WP_Admin_Bar $admin_bar)
{
  if (!current_user_can('manage_options')) {
    return;
  }

  $args = array(
    'id' => 'cia_menu',
    'title' => __('<span class="logo"> <img  src="' . get_template_directory_uri().'/core/assets/img/criacao-de-sites.png"></span>'),
    'href' => 'http://www.ciawebsites.com.br'
  );
  $admin_bar->add_node($args);

  $args = array(
    'id' => 'cia_menu_criacao',
    'parent' => 'cia_menu',
    'title' => __('Criação de Sites'),
    'href' => 'http://www.ciawebsites.com.br/solucoes/criacao-de-sites/'
  );
  $admin_bar->add_node($args);

  $args = array(
    'id' => 'cia_menu_otimizacao',
    'parent' => 'cia_menu',
    'title' => __('Otimização de Sites'),
    'href' => 'http://www.ciawebsites.com.br/solucoes/otimizacao-de-sites-seo/'
  );
  $admin_bar->add_node($args);

  $args = array(
    'id' => 'cia_menu_lojas',
    'parent' => 'cia_menu',
    'title' => __('Lojas Virtuais'),
    'href' => 'http://www.ciawebsites.com.br/solucoes/criacao-de-lojas-virtuais/'
  );
  $admin_bar->add_node($args);

}
add_action('admin_bar_menu', 'admin_bar_item', 500);


# Remover Dashboard widgets
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

// Customizar o Footer do WordPress
function remove_footer_admin(){
    echo '© <a href="http://www.ciawebsites.com.br/">Cia Web Sites</a> - Criação e otimização de sites';
}
add_filter('admin_footer_text', 'remove_footer_admin');

# PÁGINA DE LOGIN
function change_title_on_logo(){
    return 'Voltar para ' . get_bloginfo('name');}
add_filter('login_headertext ', 'change_title_on_logo');





// /* ----------------------------------------------------------------------------------- */
// /* Remove CSS Topo WP */
// /* ----------------------------------------------------------------------------------- */
// remove_action('wp_head', 'print_emoji_detection_script', 7);
// remove_action('wp_print_styles', 'print_emoji_styles');
// /* ----------------------------------------------------------------------------------- */
// /* Remove versão WP */
// /* ----------------------------------------------------------------------------------- */
// remove_action('wp_head', 'wp_generator');
// /* ----------------------------------------------------------------------------------- */
// /* Adicionar conteudo WP Login */
// /* ----------------------------------------------------------------------------------- */
// add_action( 'init', function() {
//     remove_action('rest_api_init', 'wp_oembed_register_route');
//     remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
//     remove_action('wp_head', 'wp_oembed_add_discovery_links');
//     remove_action('wp_head', 'wp_oembed_add_host_js');
// }, PHP_INT_MAX - 1 );


function cia_admin_register(){
    wp_register_style('cia-style', get_template_directory_uri().'/core/assets/css/admin-style.css', array(), '', 'all');
    wp_enqueue_script('cia-admin-main');
    wp_enqueue_style('cia-style');
}
add_action('admin_enqueue_scripts', 'cia_admin_register');

//CSS Login
function my_login_stylesheet()
{
    wp_enqueue_style('custom-login', get_template_directory_uri().'/core/assets/css/style_login.css');
}
add_action('login_enqueue_scripts', 'my_login_stylesheet');



##########//Remover códigos
//head
remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
remove_action('wp_head', 'wp_generator'); //removes meta name generator.
remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.
remove_action( 'wp_head', 'feed_links', 2 ); //removes feed links.
remove_action('wp_head', 'feed_links_extra', 3 );  //removes comments feed.
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_resource_hints', 2);
