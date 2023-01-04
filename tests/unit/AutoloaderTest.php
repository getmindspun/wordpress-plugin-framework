<?php
declare( strict_types=1 );

namespace Unit;

use Mindspun\Framework\Autoloader;
use Mindspun\Framework\Utils;
use PHPUnit\Framework\TestCase;


/**
 * Tests the Autoloader class
 */
class AutoloaderTest extends TestCase {

    private string $dir;

    public function setUp(): void {
        parent::setUp();
        $this->dir = sys_get_temp_dir() . '/autoloader';
    }

    public function tearDown(): void {
        parent::tearDown();
        Utils::rmdir( $this->dir );
    }

    /**
     * @noinspection PhpUndefinedNamespaceInspection
     * @noinspection PhpUndefinedClassInspection
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function test_psr4() {
        $psr4_class = <<<CLASS
<?php
namespace psr4\\test;
class MyTest1 {
    public static function str() { return 'Hello World'; }
}
CLASS;

        $dir = $this->dir . '/psr4/test';
        Utils::ensure_dir( $dir );
        $path = $dir . '/MyTest1.php';
        file_put_contents( $path, $psr4_class );
        Autoloader::autoload( 'psr4', $this->dir . '/psr4' );
        $result = \psr4\test\MyTest1::str();
        self::assertEquals( 'Hello World', $result );
    }

    /**
     * @noinspection PhpUndefinedNamespaceInspection
     * @noinspection PhpUndefinedClassInspection
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function test_wp() {
        $wp_class = <<<CLASS
<?php
namespace wp\\test;
class MyTest1 {
    public static function str() { return 'Hello World'; }
}
CLASS;

        $dir = $this->dir . '/wp/test';
        Utils::ensure_dir( $dir );
        $path = $dir . '/class-my-test1.php';
        file_put_contents( $path, $wp_class );
        Autoloader::autoload( 'wp', $this->dir . '/wp', 'wp' );
        $result = \wp\test\MyTest1::str();
        self::assertEquals( 'Hello World', $result );
    }

    public function test_not_found() {
        Autoloader::autoload( 'wp', $this->dir . '/wp', 'wordpress' );
        self::assertFalse( Autoloader::callback( 'wp\test\MyTest1' ) );
    }
}
