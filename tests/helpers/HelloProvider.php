<?php
// phpcs:ignoreFile Generic.Commenting.DocComment.MissingShort
declare(strict_types=1);
namespace helpers;

use mindspun\framework\Provider;

/**
 * @method static HelloProvider provide();
 */
class HelloProvider extends Provider {
    public function hello(): string {
        return 'world';
    }
}
