<?php
// phpcs:ignoreFile Generic.Commenting.DocComment.MissingShort
declare(strict_types=1);
namespace helpers;

use mindspun\framework\facades\Globals;

/**
 * @method static string|array str_replace(array|string $search, array|string $replace, string|array $subject, int &$count = null)
 */
class MockGlobals extends Globals {}
