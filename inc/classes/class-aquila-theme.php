<?php

/**
 * Boots the Theme.
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
    {
    use Singleton;

    protected function __construct()
    {
        // load classes.
        Assets::get_instance();
        Menus::get_instance();
        
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions 
        add_action( 'after_setup_theme', [$this, 'setup_theme'] );
    }

    public function setup_theme(){
        // Add website title from the WordPress customizer
        add_theme_support('title-tag');
        // Add custom logo from the WordPress customizer
        add_theme_support('custom-logo', [
            /**
             * Hides the site-title and site-description classes for the logo to be displayed
             * without text
             */
            'header-text' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 400,
            // Flex-height and width enables logo cropping
            'flex-height' => true,
            'flex-width' => true,
        ]);
        // Add custom background color and image from customizer
        add_theme_support( 'custom-background', [
            'default-color' => 'ffffff',
            'default-image' => '',
            'default-repeat' => 'no-repeat',
        ] );
        // Add post thumbnails support
        add_theme_support( 'post-thumbnails' );
        // Add support for selective refresh
        add_theme_support( 'customize-selective-refresh-widgets' );
        // Add support for feeds
        add_theme_support( 'automatic-feed-links' );
        // Add support for HTML5 
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ] );
        // Add editor theme support
        add_editor_style();
        // Support for wp-block styles
        add_theme_support( 'wp-block-styles' );
        // Add wide and full-width image support
        add_theme_support( 'align-wide' );
        // Set global content width
        global $content_width;
        if(!isset($content_width)){
            $content_width = 1600;
        }
    }
}
