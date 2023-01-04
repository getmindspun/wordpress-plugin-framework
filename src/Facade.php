<?php
declare(strict_types=1);
namespace Mindspun\Framework;

/**
 * Base class for all facades.
 */
abstract class Facade {

    /**
     * Returns the registry key for the class.
     *
     * @return string
     */
    protected static function get_provider_alias(): string {
        $class = Utils::class_basename( get_called_class() );
        return Utils::snake_case( $class );
    }

    /**
     * Allow calling instance methods statically using the registry.
     *
     * @param string $method The name of the method.
     * @param mixed  $args Any arguments passed to the underlying method.
     *
     * @return mixed
     */
    public static function __callStatic( string $method, $args ) {
        $provider = Registry::get( static::get_provider_alias() );
        return $provider->$method( ...$args );
    }
}
