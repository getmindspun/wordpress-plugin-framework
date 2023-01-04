<?php
declare(strict_types=1);
namespace Examples\Logging\Facades;

/**
 * Globals facade.
 *
 * The underlying framework is extended just to add method in the comments.
 *
 * @method static int|string wp_remote_retrieve_response_code( $response )
 * @method static void do_action( string $hook_name, mixed $arg )
 */
class Globals extends \Examples\Logging\Vendor\Mindspun\Framework\Facades\Globals {}
