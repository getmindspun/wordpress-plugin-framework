<?php
declare( strict_types=1 );

namespace Unit;

use Mindspun\Framework\Registry;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Tests the Registry class
 */
class RegistryTest extends TestCase {

    public function test_register() {
        $obj = Registry::register( 'obj', new stdClass() );
        self::assertEquals( $obj, Registry::get( 'obj' ) );
        self::assertTrue( Registry::has( 'obj' ) );
        Registry::unregister( 'obj' );
        self::assertFalse( Registry::has( 'obj' ) );
    }
}
