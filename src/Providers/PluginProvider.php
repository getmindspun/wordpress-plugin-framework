<?php

namespace Mindspun\Framework\Providers;

use Mindspun\Framework\Provider;
use Mindspun\Framework\Registry;

/**
 * Global information about this plugin.
 */
class PluginProvider extends Provider {
    /**
     * Full path of plugin file.
     *
     * @var string $file
     */
    private string $file;
    /**
     * Plugin version.
     *
     * @var string $version
     */
    private string $version;

    /**
     * Plugin slug.
     *
     * @var string $slug
     */
    private string $slug;

    /**
     * Constructor
     *
     * @param string $file The full path of the plugin file.
     * @param string $version The plugin version number.
     * @param string $slug  This plugin slug.
     */
    protected function __construct( string $file, string $version, string $slug ) {
        $this->file    = $file;
        $this->version = $version;
        $this->slug    = $slug;
    }


    /**
     * Creates an instance and registers it as the provider.
     *
     * @param string $file The full path of the plugin file.
     * @param string $version The plugin version number.
     * @param string $slug  This plugin slug.
     *
     * @return PluginProvider
     */
    public static function provide( string $file, string $version, string $slug ): PluginProvider {
        $provider = new PluginProvider( $file, $version, $slug );
        Registry::register( 'plugin', $provider );

        return $provider;
    }

    /**
     * Returns the plugin slug.
     *
     * @return string
     */
    public function get_slug(): string {
        return $this->slug;
    }

    /**
     * Returns the full path of the plugin file.
     *
     * @return string
     */
    public function get_file(): string {
        return $this->file;
    }

    /**
     * Returns plugin version.
     *
     * @return string
     */
    public function get_version(): string {
        return $this->version;
    }
}
