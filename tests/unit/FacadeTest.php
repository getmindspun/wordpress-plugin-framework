<?php
declare( strict_types=1 );

namespace unit;

use mindspun\framework\Registry;
use PHPUnit\Framework\TestCase;
use helpers\Hello;
use helpers\HelloProvider;
use stdClass;

/**
 * Tests the Facade class
 */
class FacadeTest extends TestCase {

    public function tearDown(): void {
        parent::tearDown();
        if ( Registry::has( 'hello' ) ) {
            Registry::unregister( 'hello' );
        }
    }

    public function test_hello() {
        HelloProvider::provide();
        self::assertEquals( 'world', Hello::hello() );
    }
}
