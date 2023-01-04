<?php
declare(strict_types=1);

/**
 * Plugin Name: Logging by Mindspun
 * Description: Logs all WordPress requests to a daily log file.
 * Version: 0.0.0
 * Author: Mindspun
 * Author URI: https://www.mindspun.com
 */

use examples\logging\providers\LoggerProvider;
use examples\logging\vendor\mindspun\framework\providers\GlobalsProvider;
use examples\logging\vendor\mindspun\framework\Utils;
use examples\logging\vendor\Monolog\Logger;


require_once( __DIR__ . '/autoload.php' );

/* Instantiate the plugin */
( function() {
    $path = __DIR__ . '/logs/api.log';
    Utils::ensure_dir( dirname( $path ) );

    LoggerProvider::provide(Logger::INFO, $path);
    GlobalsProvider::provide();

    /** @noinspection PhpUndefinedFunctionInspection */
    add_action( 'http_api_debug', '\examples\logging\HttpApiDebug::action', 10, 5);
} )();
