<?php
declare(strict_types=1);

namespace Unit;

use Examples\Logging\Vendor\Mindspun\Framework\Registry;
use Examples\Logging\Vendor\Mindspun\Framework\Utils;
use Mockery;

class TestCase extends \PHPUnit\Framework\TestCase {


    public function setUp(): void {
        parent::setUp();
        $this->mocks = array();
    }

    public function tearDown(): void {
        parent::tearDown();

        foreach ( $this->mocks as $alias => $provider ) {
            Registry::unregister( $alias );
        }

        Mockery::close();
    }

    protected function get_alias( $name ): string {
        $class = Utils::class_basename( $name );
        if ( str_ends_with( $class, 'Provider' ) ) {
            $class = substr( $class, 0, strlen( $class ) - 8 );
        }
        return Utils::snake_case( $class );
    }

    public function mockProvider( string $name ) {
        assert( ! array_key_exists( $name, $this->mocks ) );

        $alias = $this->get_alias( $name );
        $provider = Registry::get( $alias );
        Registry::unregister( $alias );
        $this->mocks[ $alias ] = $provider;

        $mock = Mockery::mock( $name );
        Registry::register( $alias, $mock );
        return $mock;
    }
}
