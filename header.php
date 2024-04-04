<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saasland
 */

// Theme settings options
$opt = get_option( 'saasland_opt' );


/**
 * Set correct slug for backend
 * For each language we force the slug to be the same as for default language
*/

$vars = $wp->query_vars;
$slug = "";
if (isset($vars['game'])) {
    $slug = 'casino';
} 
else {
	$details = get_post_meta( $post->ID, 'animacore', true ); // check if we have a custom metabox value
	$slug = esc_attr($details);
	if (empty($slug))
		$slug = basename(get_permalink());
}
/*
else {
    if (function_exists("pll_default_language")) {
        $default_language = pll_default_language();
        $id = pll_get_post($id, $default_language);
    }
    $post = get_post($id);
    $slug = $post->post_name;
    if ($slug == 'game') 
       $slug = 'casino';
}
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.typekit.net/tkk7sjx.css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="70" data-template="<?php echo $slug; ?>">
    <?php
    if ( function_exists('wp_body_open') ) {
        wp_body_open();
    }
    ?>

    <?php get_template_part('template-parts/header_elements/preloader'); ?>

    <div id="wrapper" data-template="<?php echo $slug; ?>" class="body_wrapper">
        <?php
        $header_style = '';
        if ( !empty($opt['header_style']) && ($opt['header_style'] != 'default' ) ) {
            $header_style = new WP_Query(array(
                'post_type' => 'header',
                'posts_per_page' => -1,
                'p' => $opt['header_style'],
            ));
        }

        /**
         * Header Navbar
         */
        if ( $header_style != '' ) {
            if ( $header_style->have_posts() ) {
                while ( $header_style->have_posts() ) : $header_style->the_post();
                    the_content();
                endwhile;
                wp_reset_postdata();
            }
        } else {
            $page_navbar_type = function_exists('get_field') ? get_field('navbar_type') : '';
            if ( !empty($page_navbar_type) && $page_navbar_type != 'default' ) {
                $navbar_type = $page_navbar_type;
            } else {
                $navbar_type = !empty($opt['navbar_type']) ? $opt['navbar_type'] : 'classic';
            }
            get_template_part( 'template-parts/header_elements/navbar', $navbar_type );
        }
?>

