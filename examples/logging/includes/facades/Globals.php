<?php
declare(strict_types=1);
namespace examples\logging\facades;

/**
 * Globals facade.
 *
 * The underlying framework is extended just to add method in the comments.
 *
 * @method static int|string wp_remote_retrieve_response_code( $response )
 * @method static void do_action( string $hook_name, mixed $arg )
 */
class Globals extends \examples\logging\vendor\mindspun\framework\facades\Globals {}
