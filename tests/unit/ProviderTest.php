<?php
declare( strict_types=1 );

namespace Unit;

use Mindspun\Framework\Registry;
use PHPUnit\Framework\TestCase;
use Helpers\HelloProvider;

/**
 * Tests the Provider class
 */
class ProviderTest extends TestCase {

    public function tearDown(): void {
        parent::tearDown();
        if ( Registry::has( 'hello' ) ) {
            Registry::unregister( 'hello' );
        }
    }

    public function test_provide() {
        HelloProvider::provide();
        self::assertTrue( Registry::has( 'hello' ) );
    }

    public function test_exception() {
        self::expectException( 'Exception' );
        HelloProvider::__callStatic( 'foo', array() );
    }
}
