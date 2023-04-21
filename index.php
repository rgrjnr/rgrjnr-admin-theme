<?php

require_once dirname(__FILE__) . '/paths.php';
require_once dirname(__FILE__) . '/plugins/index.php';
require_once dirname(__FILE__) . '/update.php';

// Style admin
function add_admin_theme()
{
    $css_uri = RGRJNR_ADMIN_ASSETS_URL . '/css/stylesheet.css?ver=1';
    echo '<link rel="stylesheet" href="' . $css_uri . '" type="text/css" media="all" />';
}

add_action('admin_head', 'add_admin_theme');

//

function remove_dashboard_meta()
{
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //since 3.8
    remove_meta_box('hmwp_dashboard_widget', 'dashboard', 'normal');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    remove_meta_box('aioseo-rss-feed', 'dashboard', 'normal');
    remove_meta_box('aioseo-overview', 'dashboard', 'normal');
}

add_action('admin_init', 'remove_dashboard_meta');

function rgrjnr_add_dashboard_widgets()
{
    global $wp_meta_boxes;

    wp_add_dashboard_widget('rgrjnr_help_widget', 'Bem-vindo', 'rgrjnr_dashboard_help');
}

function rgrjnr_dashboard_help()
{
    echo '<p>Olá, se você tiver alguma dúvida, problema ou solicitação, pode entrar em contato diretamente com <a href="mailto:roger@rogerjunior.com">roger@rogerjunior.com</a>.</p>';
}

add_action('wp_dashboard_setup', 'rgrjnr_add_dashboard_widgets');