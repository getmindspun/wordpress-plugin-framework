<?php
declare(strict_types=1);

use examples\logging\vendor\mindspun\framework\Autoloader;

$root = dirname( __FILE__, 2 );
require $root . '/autoload.php';
require $root . '/vendor/autoload.php';

Autoloader::autoload( 'Unit', __DIR__ . '/Unit' );
