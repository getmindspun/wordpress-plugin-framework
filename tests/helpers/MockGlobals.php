<?php
// phpcs:ignoreFile Generic.Commenting.DocComment.MissingShort
declare(strict_types=1);
namespace Helpers;

use Mindspun\Framework\Facades\Globals;

/**
 * @method static string|array str_replace(array|string $search, array|string $replace, string|array $subject, int &$count = null)
 */
class MockGlobals extends Globals {
    protected static function get_provider_alias(): string {
        return 'globals';
    }
}
