<?php
declare(strict_types=1);

/**
 * Plugin Name: Logging by Mindspun
 * Description: Logs all WordPress requests to a daily log file.
 * Version: 0.0.0
 * Author: Mindspun
 * Author URI: https://www.mindspun.com
 */

use Examples\Logging\Providers\LoggerProvider;
use Examples\Logging\Vendor\Mindspun\Framework\Providers\GlobalsProvider;
use Examples\Logging\Vendor\Mindspun\Framework\Utils;
use Examples\Logging\Vendor\Monolog\Logger;


require_once( __DIR__ . '/autoload.php' );

/* Instantiate the plugin */
( function() {
    $path = __DIR__ . '/logs/api.log';
    Utils::ensure_dir( dirname( $path ) );

    LoggerProvider::provide( Logger::INFO, $path );
    GlobalsProvider::provide();

    /* @noinspection PhpUndefinedFunctionInspection */
    add_action( 'http_api_debug', '\Examples\Logging\HttpApiDebug::action', 10, 5 );
} )();
