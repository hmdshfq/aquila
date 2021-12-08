<?php 
/**
 * Register menus
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

class Menus{
    // The Singleton trait will make sure that this class is instantiated only once.
    use Singleton;

    protected function __construct()
    {
        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Action hook for registering menus
        add_action('init', [$this, 'register_menus']);
    }

    // Register menus
    public function register_menus(){
        register_nav_menus( [
            'aquila-header-menu' => esc_html__( 'Header Menu', 'aquila' ),
            'aquila-footer-menu' => esc_html__( 'Footer Menu', 'aquila' )
        ] );
    }

}

?>