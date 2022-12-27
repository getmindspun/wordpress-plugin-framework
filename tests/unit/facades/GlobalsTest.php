<?php
declare(strict_types=1);
namespace unit\facades;

use PHPUnit\Framework\TestCase;
use helpers\MockGlobals;

class GlobalsTest extends TestCase {

    public function test_call_static() {
        $str = MockGlobals::str_replace( '%name%', 'World', 'Hello %name%' );
        self::assertEquals( 'Hello World', $str );
    }
}
