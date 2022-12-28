<?php
declare(strict_types=1);

namespace unit;

use examples\logging\HttpApiDebug;
use Mockery;

class HttpApiDebugTest extends TestCase {

    public function test_action() {
        $globals = self::mockProvider( 'example\includes\providers\GlobalsProvider' );
        $globals->shouldReceive( 'wp_remote_retrieve_response_code' )
            ->andReturn( 400 )
            ->once();
        $logger = self::mockProvider( 'example\includes\providers\LoggerProvider' );
        $logger->shouldReceive( 'info' )->once();

        self::assertEquals( array(), HttpApiDebug::action( array(), 'test', 'test', array(), '/' ) );
    }

    public function test_action_error() {
        $error = Mockery::mock( 'WP_Error' );
        $error->shouldReceive( 'get_error_messages' )->andReturn( array() )->once();
        $error->shouldReceive( 'get_all_error_data' )->andReturn( array() )->once();

        $logger = self::mockProvider( 'example\includes\providers\LoggerProvider' );
        $logger->shouldReceive( 'warning' )->once();

        self::assertEquals( $error, HttpApiDebug::action( $error, 'test', 'test', array(), '/' ) );
    }
}
