<?php
declare(strict_types=1);

use Mindspun\Framework\Autoloader;

require dirname( __DIR__, 1 ) . '/src/Autoloader.php';

$root = dirname( __DIR__, 1 );
Autoloader::autoload( 'Mindspun\Framework', $root . '/src' );
Autoloader::autoload( 'Helpers', __DIR__ . '/helpers' );
