<?php

namespace AQUILA_THEME\Inc\Traits;

/**
 * A trait is like a class but it cannot be instantiated, instead it can be accessed by 'use'. A trait contains all the common methods and properties that some classes can use. Here the Singleton trait is making sure that there is one and only instance of any class that uses this Singleton.
 */
trait Singleton
{
    public function __construct()
    {
    }
    public function __clone()
    {
    }
    /**
     * final means that this function cannot be overwritten
     * static means that this function doesn't need an instance for calling. It can be accessed 
     * directly
     */
    final public static function get_instance()
    {
        static $instance = [];
        $called_class = get_called_class();

        if (!isset($instance[$called_class])) {
            $instance[$called_class] = new $called_class();

            do_action(sprintf('aquila_theme_singleton_init%s', $called_class));
        }

        return $instance[$called_class];
    }
}
