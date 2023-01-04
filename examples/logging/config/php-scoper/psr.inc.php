<?php
/**
 * @noinspection PhpUndefinedNamespaceInspection
 * @noinspection PhpUndefinedClassInspection
 */
use Isolated\Symfony\Component\Finder\Finder;

return [
    'finders' => [
        Finder::create()->files()
            ->in( 'vendor/psr/log/Psr/Log' )
            ->notName('/LICENSE|.*\\.md|.*\\.xml|.*\\.dist|Makefile|composer\\.json|composer\\.lock/')
            ->exclude([
                'tests',
            ]),
    ],
];