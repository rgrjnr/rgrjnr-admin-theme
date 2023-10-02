<?php

/**
 * @package Page List Preview
 */

if (!defined('ABSPATH')) {
    die;
}

function plp_filter_pages_columns($columns)
{
    /** Add a 'Preview' Column **/
    $myCustomColumns = array(
        'preview-thumbnail' => __('Preview')
    );

    $pos = 1;
    $val = $myCustomColumns;

    $columns = array_merge(array_slice($columns, 0, $pos), $val, array_slice($columns, $pos));

    return $columns;
}

function plp_add_script_to_admin_pages_list()
{
    // $pagenow, is a global variable referring to the filename of the current page
    global $pagenow;

    if ($pagenow != 'edit.php') {
        return;
    }
}

add_action('admin_enqueue_scripts', 'plp_add_script_to_admin_pages_list');

function create_plp_pages_column($column, $post_id)
{
    if ('preview-thumbnail' === $column) {

        $plp_page_link =  get_permalink($post_id);

        echo '
	    <div class="plp-container">
        <div class="plp-wrapper">
        <div class="plp-block plp-resizable">
                <iframe
                    class="plp-iframe"
                    sandbox="allow-scripts allow-same-origin" 
                    loading="lazy" 
                    scrolling="no"   
                    src="' . esc_url($plp_page_link) . '">
                </iframe>
                </div>
                </div>
	    </div>
		';
    }
}

add_filter('manage_pages_columns', 'plp_filter_pages_columns');

add_action('manage_pages_custom_column', 'create_plp_pages_column', 10, 2);


///////////