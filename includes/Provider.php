<?php
declare(strict_types=1);
namespace mindspun\framework;

use Exception;

/**
 * Base class for all providers.
 */
abstract class Provider {
    /**
     * Gets this providers name.
     *
     * @return string
     */
    protected static function get_alias(): string {
        $class = Utils::class_basename( get_called_class() );
        if ( Utils::str_ends_with( $class, 'Provider' ) ) {
            $class = substr( $class, 0, strlen( $class ) - 8 );
        }
        return Utils::snake_case( $class );
    }

    /**
     * Creates an instance and registers it as the provider.
     *
     * @param string $method The name of the method.
     * @param mixed  $args Any arguments passed to the underlying method.
     *
     * @return Provider
     * @throws Exception Thrown when the method doesn't exist.
     */
    public static function __callStatic( string $method, $args ) {
        if ( 'provide' === $method ) {
            $instance = new static( ...$args );
            Registry::register( static::get_alias(), $instance );

            return $instance;
        }
        throw new Exception( 'Method ' . $method . ' is not supported.' );
    }
}
