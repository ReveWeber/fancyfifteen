<?php

/* 
* Enqueue parent and child stylesheets - needed for all mods
*/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

/*
* Modify existing sidebar widget to include dropdown arrows - needed for accordion-folding widgets
*/

add_action( 'widgets_init', 'aqa_replace_sidebar', 11 );
function aqa_replace_sidebar() {
	unregister_sidebar( 'sidebar-1' );
	register_sidebar( array(
		'name'          => __( 'Sidebar Widget Area', 'fancyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar and accordion-fold.', 'fancyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '<span class="accordion-arrow"><span class="screen-reader-text">expand widget</span></span></h2>',
	) );
}

/*
* Enqueue JavaScript for accordion-folding widget action
*/

function accordion_scripts() {
	wp_enqueue_script( 'aqa-sidebar-accordion', get_stylesheet_directory_uri() . '/aqa-sidebar-accordion.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'accordion_scripts' );

/*
 * Enqueue styles and scripts for the Flickity carousel
 */
 
function carousel_scripts() {
    wp_enqueue_style( 'flickity-style', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.min.css' );
    wp_enqueue_script( 'flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.pkgd.min.js', array('jquery') );
    wp_enqueue_script( 'gallery-carousel', get_stylesheet_directory_uri() . '/aqa-carousel.js', array('flickity'), '1', true );
}
add_action( 'wp_enqueue_scripts', 'carousel_scripts' );

/*
* Enqueue jQuery plugin and program for attractive sidebar scrolling
*/

function aqa_scrolling_scripts() {
	wp_enqueue_script( 'jquery-slimscroll', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js', array('jquery') );
	wp_enqueue_script( 'aqa-pretty-scrolling', get_stylesheet_directory_uri() . '/aqa-pretty-scrolling.js', array('jquery-slimscroll') );
}
add_action( 'wp_enqueue_scripts', 'aqa_scrolling_scripts' );

/*
* Enqueue jQuery program for AJAXified gallery and menu button
*/

function aqa_gallery_scripts() {
	wp_enqueue_script( 'aqa-gallery-menu', get_stylesheet_directory_uri() . '/aqa-gallery-menu.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'aqa_gallery_scripts' );
