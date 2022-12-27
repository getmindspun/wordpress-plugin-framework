<?php
declare(strict_types=1);
namespace mindspun\framework\facades;

use mindspun\framework\Facade;

/**
 * Globals pseudo-facade.
 */
class Globals extends Facade {

    /**
     * Translates the method to the global function.
     *
     * @param string $method The name of the function to be called.
     * @param mixed  $args function arguments.
     * @return mixed
     */
    public static function __callStatic( string $method, $args ) {
        return call_user_func( $method, ...$args );
    }
}
