<?php

namespace cva67\phpmvc\config;

class config
{

    protected static array $configs = [];

    public static function load($configPath)
    {

        if (!is_dir($configPath)) {
            throw new \Exception("Config directory not found: {$configPath}");
        }

        $configFiles = glob($configPath . '/*.php');

        foreach ($configFiles as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if ($filename === 'config') {
                continue;
            }
            self::$configs[$filename] = require $file;
        }
    }
    public static function get($configName, $key = null, $default = null)
    {

        if (!isset(self::$configs[$configName])) {
            return $default;
        }


        if ($key === null) {
            return self::$configs[$configName];
        }

        return self::$configs[$configName][$key] ?? $default;
    }
}
