<?php

require_once dirname(__FILE__) . '/paths.php';
require_once dirname(__FILE__) . '/plugins/index.php';

// Style admin
function add_admin_theme()
{
    $css_uri = RGRJNR_ADMIN_ASSETS_URL . '/css/stylesheet.css?ver=';
    echo '<link rel="stylesheet" href="' . $css_uri . '" type="text/css" media="all" />';
}

add_action('admin_head', 'add_admin_theme');