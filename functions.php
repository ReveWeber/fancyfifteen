<?php

/* 
* Enqueue parent and child stylesheets
*/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

/*
* Modify existing sidebar widget to include dropdown arrows
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
* Enqueue JavaScript for accordion action
*/

function aqa_scripts() {
	wp_enqueue_script( 'aqa-sidebar-accordion', get_stylesheet_directory_uri() . '/aqa-sidebar-accordion.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'aqa_scripts' );
