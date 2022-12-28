<?php
declare( strict_types=1 );

namespace unit;

use helpers\MockGlobals;
use mindspun\framework\providers\GlobalsProvider;
use PHPUnit\Framework\TestCase;

class GlobalsTest extends TestCase {
    public function test_provide() {
        $provider = GlobalsProvider::provide();
        self::assertEquals(
            'Hello World',
            MockGlobals::str_replace( '%name%', 'World', 'Hello %name%' )
        );
    }
}
