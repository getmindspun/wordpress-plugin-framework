<?php
declare(strict_types=1);

use examples\logging\vendor\mindspun\framework\Autoloader;

require_once( __DIR__ . '/vendor_prefixed/mindspun/framework/Autoloader.php' );
Autoloader::autoload( 'examples\logging\vendor', __DIR__ . '/vendor_prefixed');
Autoloader::autoload( 'examples\logging', __DIR__ . '/includes' );
