<?php
declare(strict_types=1);

namespace Unit;

use Examples\Logging\Providers\LoggerProvider;
use Examples\Logging\Vendor\Monolog\Logger;

class ProvidersTest extends TestCase {


    public function test_provider() {
         $logger = LoggerProvider::provide( Logger::INFO, sys_get_temp_dir() . '/logs' );
        self::assertNotEmpty( $logger );
    }
}
