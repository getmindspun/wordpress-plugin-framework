<?php
/**
 * @noinspection PhpUndefinedNamespaceInspection
 * @noinspection PhpUndefinedClassInspection
 */
use Isolated\Symfony\Component\Finder\Finder;

return [
    'finders' => [
        Finder::create()->files()
            ->in( 'vendor/mindspun/wordpress-plugin-framework' )
            ->notName('/LICENSE|.*\\.md|.*\\.xml|.*\\.dist|Makefile|composer\\.json|composer\\.lock/')
            ->exclude([
                'build',
                'examples',
                'tests',
                'vendor',
            ]),
    ],
];
