<?php
declare( strict_types=1 );

namespace Unit;

use Helpers\MockGlobals;
use Mindspun\Framework\Providers\PluginProvider;
use PHPUnit\Framework\TestCase;

class PluginTest extends TestCase {
    public function test_provide() {
        $provider = PluginProvider::provide( __FILE__, '0.0.0', 'framework-slug' );
        self::assertEquals( __FILE__, $provider->get_file() );
        self::assertEquals( '0.0.0', $provider->get_version() );
        self::assertEquals( 'framework-slug', $provider->get_slug() );
    }
}
