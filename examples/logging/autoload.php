<?php
declare(strict_types=1);

use Examples\Logging\Vendor\Mindspun\Framework\Autoloader;

require_once( __DIR__ . '/vendor_prefixed/autoload.php' );
Autoloader::autoload( 'Examples\Logging', __DIR__ . '/includes' );
