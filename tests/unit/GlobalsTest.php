<?php
declare( strict_types=1 );

namespace Unit;

use Helpers\MockGlobals;
use Mindspun\Framework\Providers\GlobalsProvider;
use PHPUnit\Framework\TestCase;

class GlobalsTest extends TestCase {
    public function test_provide() {
        GlobalsProvider::provide();
        self::assertEquals(
            'Hello World',
            MockGlobals::str_replace( '%name%', 'World', 'Hello %name%' )
        );
    }
}
