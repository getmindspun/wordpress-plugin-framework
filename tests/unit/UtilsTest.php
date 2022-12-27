<?php
declare( strict_types=1 );

namespace unit;

use mindspun\framework\Utils;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Utils class
 */
class UtilsTest extends TestCase {

    public function test_snake_case() {
        self::assertEquals( 'my_class', Utils::snake_case( 'MyClass' ) );
        self::assertEquals( 'simple_xml', Utils::snake_case( 'SimpleXML' ) );
    }

    public function test_class_base_name() {
        self::assertEquals( 'MyClass', Utils::class_basename( 'MyClass' ) );
        self::assertEquals( 'MyClass', Utils::class_basename( '\MyClass' ) );
        self::assertEquals( 'MyClass', Utils::class_basename( 'foo\baz\MyClass' ) );
    }

    public function test_str_ends_with() {
        $this->assertTrue( Utils::str_ends_with( 'Hello World', 'World' ) );
    }

    public function test_dir() {
        $tmp = sys_get_temp_dir() . '/foo/bar';
        Utils::ensure_dir( $tmp );
        self::assertTrue( is_dir( $tmp ) );

        $file = $tmp . '/baz';
        touch( $file );

        $dir = sys_get_temp_dir() . '/foo';
        self::assertTrue( Utils::rmdir( $dir ) );
        self::assertFalse( Utils::rmdir( $dir ) );
    }
}
