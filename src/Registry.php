<?php
declare(strict_types=1);
namespace Mindspun\Framework;

/**
 * Registry programming model.
 */
final class Registry {

    /**
     * The class instances.
     *
     * @var array
     */
    private static array $instances = array();

    /**
     * Register a new instance.
     *
     * @param string $name Registry key (usually human-readable).
     * @param mixed  $instance The singleton instance associated with this name.
     *
     * @return mixed
     */
    public static function register( string $name, $instance ) {
        assert( ! array_key_exists( $name, self::$instances ), "Registry key exists: '$name'" );
        self::$instances[ $name ] = $instance;
        return $instance;
    }

    /**
     * Get an instance from the registry.
     *
     * @param string $name The registry key.
     *
     * @return mixed
     */
    public static function get( string $name ) {
        return self::$instances[ $name ] ?? null;
    }

    /**
     * Removes an instance from the registry.
     *
     * @param string $name The registry key.
     *
     * @return void
     */
    public static function unregister( string $name ): void {
        unset( self::$instances[ $name ] );
    }

    /**
     * Test for the instance in the registry.
     *
     * @param string $name The registry key.
     *
     * @return bool
     */
    public static function has( string $name ): bool {
        return array_key_exists( $name, self::$instances );
    }
}
