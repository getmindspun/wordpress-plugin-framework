<?php
declare(strict_types=1);
namespace mindspun\framework;

/**
* Class autoloader.
*/
final class Autoloader {

    /**
     * Contains namespaces to autoload from our source directory.
     *
     * @var array
     */
    private static array $namespaces = array();

    /**
     * Has spl_autoload_register been called?
     *
     * @var bool
     */
    private static bool $registered = false;

    /**
     * Convert CamelCase class to WordPress-style name.
     *
     * @param string $str The CamelCase string.
     *
     * @return string
     */
    private static function wp_name( string $str ): string {
        return strtolower( preg_replace( array( '/([a-z\d])([A-Z])/', '/([^-])([A-Z][a-z])/' ), '$1-$2', $str ) );
    }

    /**
     * Generates a WordPress class path.
     *
     * @param string $namespace The class namespace.
     * @param string $class The class FQN.
     * @return string
     */
    private static function wp_path( string $namespace, string $class ) : string {
        $dir = self::$namespaces[ $namespace ]['dir'];
        $file = str_replace( '\\', '/', substr( $class, strlen( $namespace ) ) );
        $file = dirname( $file ) . '/class-' . self::wp_name( basename( $file ) ) . '.php';
        return preg_replace( '#/+#', '/', $dir . '/' . $file );
    }

    /**
     * Generates a PSR4 class path.
     *
     * @param string $namespace The class namespace.
     * @param string $class The class FQN.
     * @return string
     */
    private static function psr4_path( string $namespace, string $class ) : string {
        $dir = self::$namespaces[ $namespace ]['dir'];
        $file = str_replace( '\\', '/', substr( $class, strlen( $namespace ) ) ) . '.php';
        return preg_replace( '#/+#', '/', $dir . '/' . $file );
    }

    /**
     * Autoloader callback
     *
     * @param string $class The class FQN.
     *
     * @return bool
     */
    public static function callback( string $class ) : bool {
        foreach ( array_keys( self::$namespaces ) as $namespace ) {
            if ( strpos( $class, $namespace ) === 0 ) {
                $path = '';
                switch ( self::$namespaces[ $namespace ]['type'] ) {
                    case 'psr4':
                        $path = self::psr4_path( $namespace, $class );
                        break;

                    case 'wp':
                    case 'wordpress':
                        $path = self::wp_path( $namespace, $class );
                        break;
                }

                if ( ! empty( $path ) && file_exists( $path ) ) {
                    require $path;
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Autoload the namespace from the specified path.
     *
     * @param string $namespace The namespace to load.
     * @param string $dir The directory path of the class files.
     * @param string $type The naming convention type.
     * @return void
     */
    public static function autoload( string $namespace, string $dir, string $type = 'psr4' ) {
        $array = array(
            'dir' => $dir,
            'type' => strtolower( $type ),
        );

        self::$namespaces[ $namespace ] = $array;
        if ( ! self::$registered ) {
            // @codeCoverageIgnoreStart
            /**
             * This code called during testing by bootstrap.php - or nothing would work -
             * but the coverage report doesn't find it.
             */
            spl_autoload_register( self::class . '::callback' );
            self::$registered = true;
            // @codeCoverageIgnoreEnd
        }
    }
}
