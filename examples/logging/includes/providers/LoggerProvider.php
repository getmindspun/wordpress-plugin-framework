<?php
declare(strict_types=1);
namespace examples\logging\providers;

use examples\logging\vendor\mindspun\framework\Registry;
use examples\logging\vendor\Monolog\Formatter\LineFormatter;
use examples\logging\vendor\Monolog\Handler\RotatingFileHandler;
use examples\logging\vendor\Monolog\Logger;

/**
 * Logger provider using Monolog.
 */
class LoggerProvider extends Logger {
    const FORMAT = "[%datetime%] %level_name%: %message% %context% %extra%\n";

    /**
     * Constructor
     *
     * @param mixed  $level  Log level.
     * @param string $path File path.
     * @param int    $max_files Max files to keep (default=7).
     */
    public function __construct( $level, string $path, int $max_files = 7 ) {
        parent::__construct( 'default' );
        $handler = new RotatingFileHandler( $path, $max_files, $level );
        $handler->setFormatter( new LineFormatter( static::FORMAT ) );
        $this->pushHandler( $handler );
    }

    /**
     * Creates an instance and registers it as the provider.
     *
     * @param mixed  $level  Log level.
     * @param string $path File path.
     * @param int    $max_files Max files to keep (default=7).
     *
     * @return LoggerProvider
     */
    public static function provide( $level, string $path, int $max_files = 7 ): LoggerProvider {
        $logger = new LoggerProvider( $level, $path, $max_files );
        Registry::register( 'logger', $logger );
        return $logger;
    }
}
