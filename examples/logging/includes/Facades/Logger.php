<?php
declare(strict_types=1);
namespace Examples\Logging\Facades;

use Examples\Logging\Vendor\Mindspun\Framework\Facade;

/**
 * PSR3 Logger facade.
 *
 * @method static void emergency( string $message, array $context = array() )
 * @method static void alert( string $message, array $context = array() )
 * @method static void critical( string $message, array $context = array() )
 * @method static void error( string $message, array $context = array() )
 * @method static void warning ( string $message, array $context = array() )
 * @method static void notice ( string $message, array $context = array() )
 * @method static void info ( string $message, array $context = array() )
 * @method static void debug ( string $message, array $context = array() )
 */
class Logger extends Facade {}
