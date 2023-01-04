<?php

use Mindspun\Framework\Autoloader;

require dirname( __FILE__, 2 ) . '/src/Autoloader.php';

$root = dirname( __FILE__, 2 );
Autoloader::autoload( 'Mindspun\Framework', $root . '/src' );
Autoloader::autoload( 'Helpers', __DIR__ . '/helpers' );
