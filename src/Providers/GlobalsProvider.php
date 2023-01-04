<?php
declare(strict_types=1);
namespace Mindspun\Framework\Providers;

use Mindspun\Framework\Provider;
use Mindspun\Framework\Registry;

/**
 * Globals provider.
 */
class GlobalsProvider extends Provider {

    /**
     * Registers the provider.
     *
     * @return GlobalsProvider
     */
    public static function provide(): GlobalsProvider {
        $instance = new static();
        Registry::register( static::get_alias(), $instance );

        return $instance;
    }

    /**
     * Translates the method to the global function.
     *
     * @param string $method The name of the function to be called.
     * @param mixed  $args function arguments.
     * @return mixed
     */
    public function __call( string $method, $args ) {
        return call_user_func( $method, ...$args );
    }
}
