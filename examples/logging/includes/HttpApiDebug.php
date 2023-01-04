<?php
declare(strict_types=1);

namespace Examples\Logging;

use Examples\Logging\Facades\Globals;
use Examples\Logging\Facades\Logger;

/**
 * The http_api_debug hook.
 */
class HttpApiDebug {

    /**
     * The action/hook itself.
     *
     * @param mixed  $response The response or WP_Error object.
     * @param string $context Context under which the hook is fired.
     * @param string $class HTTP Transport used.
     * @param array  $parsed_args The request.
     * @param string $url The URL.
     * @return mixed
     */
    public static function action( $response, string $context, string $class, array $parsed_args, string $url ) {
        if ( is_a( $response, 'WP_Error', true ) ) {
            Logger::warning(
                $url,
                array(
                    'errors' => $response->get_error_messages(),
                    'error_data' => $response->get_all_error_data(),
                    'context' => $context,
                    'class' => $class,
                    'request' => $parsed_args,
                )
            );
        } else {
            Logger::info(
                $url,
                array(
                    'status_code' => Globals::wp_remote_retrieve_response_code( $response ),
                    'context' => $context,
                    'class' => $class,
                    'request' => $parsed_args,
                )
            );
        }//end if

        return $response;
    }
}
