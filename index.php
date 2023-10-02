<?php /*
 * Plugin Name:       Custom Admin Theme
 * Description:       This plugins gives a custom appearance to the WordPress admin panel and some other features.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Roger Junior
 * Author URI:        https://rogerjunior.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       rgrjnr
 * Domain Path:       /languages
 */

require_once dirname(__FILE__) . '/paths.php';
require_once dirname(__FILE__) . '/plugins/index.php';
require_once dirname(__FILE__) . '/preview.php';
require_once dirname(__FILE__) . '/tutorials.php';

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
    remove_meta_box('aioseo-seo-setup', 'dashboard', 'normal');
    remove_meta_box('postcustom', 'dashboard', 'normal');
}

add_action('admin_init', 'remove_dashboard_meta');

function rgrjnr_add_dashboard_widgets()
{
    global $wp_meta_boxes;

    wp_add_dashboard_widget('rgrjnr_help_widget', __("Bem-vindo", "rgrjnr"), 'rgrjnr_dashboard_help');
}



function rgrjnr_dashboard_help()
{
    _e('<p>Olá, se você tiver alguma dúvida, problema ou solicitação, pode entrar em contato diretamente com <a href="mailto:roger@rogerjunior.com">roger@rogerjunior.com</a>.</p>', 'rgrjnr');
}

add_action('wp_dashboard_setup', 'rgrjnr_add_dashboard_widgets');

function find_wp_config_path()
{
    $dir = dirname(__FILE__);
    do {
        if (file_exists($dir . "/wp-config.php")) {
            return $dir;
        }
    } while ($dir = realpath("$dir/.."));
    return null;
}

/**
 * Activate the plugin.
 */
function rgrjnr_activate()
{
    // Trigger our function that registers the custom post type plugin.
    rgrjnr_update_htaccess();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'rgrjnr_activate');


function rgrjnr_update_htaccess()
{

    $HTACCESS_PLUGIN_CHANGES = "# BEGIN RGRJNR
# Last updated at 20230524

# Hide Author by ID
RewriteEngine On
RewriteCond %{QUERY_STRING} ^author= [NC]
RewriteRule .* - [F,L]
RewriteRule ^author/ - [F,L]

# Block WordPress xmlrpc.php requests
<Files xmlrpc.php>
order deny,allow
deny from all
</Files>

# END RGRJNR";

    $re = '/(# BEGIN RGRJNR)(\s|.)*(# END RGRJNR)/mi';

    $fn = find_wp_config_path() . "/.htaccess";

    if (file_exists($fn)) {
        $FILE = fopen($fn, "r+");
        $htaccess = fread($FILE, filesize($fn));

        preg_match_all($re, $htaccess, $matches, PREG_SET_ORDER, 0);

        if (count($matches) > 0) {
            $update_re = '/# Last updated at (\d{8})/mi';
            preg_match_all($update_re, $htaccess, $matches_update, PREG_SET_ORDER, 0);

            if ($matches_update[0][1] > date('Ymd')) {
                $htaccess = preg_replace($re, $HTACCESS_PLUGIN_CHANGES, $htaccess);
                file_put_contents($fn, $htaccess);
                fclose($FILE);
            }
        } else {
            $htaccess = $HTACCESS_PLUGIN_CHANGES . $htaccess;

            file_put_contents($fn, $htaccess);
            fclose($FILE);
        };
    } else {

        $FILE = fopen($fn, "w");
        file_put_contents($fn, $HTACCESS_PLUGIN_CHANGES);
        fclose($FILE);
    }
}