<?php

use mindspun\framework\Autoloader;

require dirname( __FILE__, 2 ) . '/includes/Autoloader.php';

$root = dirname( __FILE__, 2 );
Autoloader::autoload( 'mindspun\framework', $root . '/includes' );
Autoloader::autoload( 'helpers', __DIR__ . '/helpers' );
