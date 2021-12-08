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
        // load class.
        Assets::get_instance();
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
        ])
    }
}
