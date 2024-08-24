<?php
declare(strict_types=1);
namespace Mindspun\Framework;

/**
 * General utility functions
 */
class Utils {

    /**
     * Convert CamelCase to snake_case.
     *
     * @param string $str The CamelCase string.
     *
     * @return string
     */
    public static function snake_case( string $str ): string {
        return strtolower( preg_replace( array( '/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/' ), '$1_$2', $str ) );
    }

    /**
     * Convert CamelCase class to param style name.
     *
     * @param string $str The CamelCase string.
     *
     * @return string
     */
    public static function param_case( string $str ): string {
        return strtolower( preg_replace( array( '/([a-z\d])_?([A-Z])/', '/([^-])([A-Z][a-z])/' ), '$1-$2', $str ) );
    }

    /**
     * Gets the class short name without the namespace.
     *
     * @param string $class The class name.
     *
     * @return false|string
     */
    public static function class_basename( string $class ) {
        $str = strrchr( $class, '\\' );
        return $str ? substr( $str, 1 ) : $class;
    }

    /**
     * PHP8: str_ends_with
     *
     * @param string $haystack The string to search.
     * @param string $needle The string to be found.
     *
     * @return bool
     */
    public static function str_ends_with( string $haystack, string $needle ): bool {
        $length = strlen( $needle );

        return ! ( $length > 0 ) || substr( $haystack, - $length ) === $needle;
    }

    /**
     * Ensure the given directory exists.
     *
     * NOTE: recursive defaults to TRUE unlike mkdir.
     *
     * @param string $directory This directory path.
     * @param int    $permissions  Directory permissions.
     * @param bool   $recursive Recursively create or not.
     *
     * @return void
     */
    public static function ensure_dir(
        string $directory,
        int $permissions = 0777,
        bool $recursive = true
    ) {
        if ( ! is_dir( $directory ) ) {
            mkdir( $directory, $permissions, $recursive );
        }
    }

    /**
     * Safe, recursive rmdir
     *
     * @param string $dir The directory path.
     *
     * @return bool
     */
    public static function rmdir( string $dir ): bool {
        if ( file_exists( $dir ) ) {
            foreach ( scandir( $dir ) as $item ) {
                if ( '.' === $item || '..' === $item ) {
                    continue;
                }

                $path = $dir . DIRECTORY_SEPARATOR . $item;
                if ( is_dir( $path ) ) {
                    self::rmdir( $dir . DIRECTORY_SEPARATOR . $item );
                } else {
                    unlink( $path );
                }
            }

            return rmdir( $dir );
        }
        return false;
    }
}
