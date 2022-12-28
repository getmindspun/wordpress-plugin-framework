<?php
declare(strict_types=1);

namespace unit;

use examples\logging\providers\LoggerProvider;
use examples\logging\vendor\Monolog\Logger;

class ProvidersTest extends TestCase {


    public function test_provider() {
         $logger = LoggerProvider::provide( Logger::INFO, sys_get_temp_dir() . '/logs' );
        self::assertNotEmpty( $logger );
    }
}
