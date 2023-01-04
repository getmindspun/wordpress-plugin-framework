<?php
// phpcs:ignoreFile Generic.Commenting.DocComment.MissingShort
declare(strict_types=1);
namespace Helpers;

use Mindspun\Framework\Provider;

/**
 * @method static HelloProvider provide();
 */
class HelloProvider extends Provider {
    public function hello(): string {
        return 'world';
    }
}
