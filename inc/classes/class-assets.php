<?php 
/**
 * Enqueue theme assets
 * 
 * @package Aquila
 */

/**
 * A namespace lets us use multiple classes with the same name. In other words it is just a prefix infront of class name for making the class unique.
 */
namespace AQUILA_THEME\Inc;

/**
 * use lets us use a trait. Here our trait is called Singleton.
 */
use AQUILA_THEME\Inc\Traits\Singleton;

class Assets{
    // The Singleton trait will make sure that this class is instantiated only once.
    use Singleton;

    protected function __construct()
    {
        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions 
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        // filemtime() outputs a different version number whenever the file changes
        // Register styles and use them later / conditionally
        wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap-css', AQUILA_DIR_URI . '/assets/library/css/bootstrap.min.css', [], false, 'all');

        // Enqueue styles
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts()
    {
        // Register scripts and use them later / conditionally
        wp_register_script('main-js', AQUILA_DIR_URI . '/assets/scripts/main.js', [], filemtime(AQUILA_DIR_PATH . '/assets/scripts/main.js'), true);
        wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/library/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}

?>