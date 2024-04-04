<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 * Setup My Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function saasland_child_theme_setup()
{
    load_child_theme_textdomain('saasland-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'saasland_child_theme_setup');


// BEGIN ENQUEUE PARENT ACTION
if (!function_exists('saasland_child_thm_parent_css')) :
    function saasland_child_thm_parent_css()
    {
        $v = 1;
        wp_enqueue_style(
            'child-theme-override',
            get_stylesheet_directory_uri() . '/css/override.css',
            [],
            $v
        );
        if (is_page()) {
            wp_enqueue_style(
                'saasland-child-parent-theme-root',
                trailingslashit(get_template_directory_uri()) . 'style.css',
                array('saasland-root', 'saasland-elements', 'saasland-fonts', 'bootstrap', 'eleganticons', 'themify-icon', 'saasland-main', 'saasland-wpd', 'saasland-gutenberg')
            );
        }

        if (is_singular('case_study')) {
            wp_enqueue_style(
                'saasland-child-parent-theme-root',
                trailingslashit(get_template_directory_uri()) . 'style.css',
                array('saasland-root', 'saasland-cstudy', 'saasland-fonts', 'bootstrap', 'eleganticons', 'themify-icon', 'saasland-main', 'saasland-wpd', 'saasland-gutenberg')
            );
        }

        if (is_singular('job') || is_page_template('page-job-apply-form.php') || is_singular('service')) {
            wp_enqueue_style(
                'saasland-child-parent-theme-root',
                trailingslashit(get_template_directory_uri()) . 'style.css',
                array('saasland-root', 'saasland-job', 'saasland-fonts', 'bootstrap', 'eleganticons', 'themify-icon', 'saasland-main', 'saasland-wpd', 'saasland-gutenberg')
            );
        }

        if (is_singular('portfolio')) {
            wp_enqueue_style(
                'saasland-child-parent-theme-root',
                trailingslashit(get_template_directory_uri()) . 'style.css',
                array('saasland-root', 'saasland-portfolio', 'saasland-fonts', 'bootstrap', 'eleganticons', 'themify-icon', 'saasland-main', 'saasland-wpd', 'saasland-gutenberg')
            );
        }

        if (is_home() || is_singular('post') || is_search() || is_archive()) {
            wp_enqueue_style(
                'saasland-child-parent-theme-root',
                trailingslashit(get_template_directory_uri()) . 'style.css',
                array('saasland-root', 'saasland-blog', 'saasland-fonts', 'bootstrap', 'eleganticons', 'themify-icon', 'saasland-main', 'saasland-wpd', 'saasland-gutenberg')
            );
        }
    }
endif;
add_action('wp_enqueue_scripts', 'saasland_child_thm_parent_css', 20);

// END ENQUEUE PARENT ACTION

add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
 
    if(get_field('body_class')) {
        $classes[] = get_field('body_class');
    }
     
    return $classes;
     
}

function add_file_types_to_uploads($file_types)
{
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);
  return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');



add_action('wp_footer',function () {
    echo file_get_contents(get_stylesheet_directory()."/static/providers.svg");
    echo file_get_contents(get_stylesheet_directory()."/static/providers-colored.svg");

});
