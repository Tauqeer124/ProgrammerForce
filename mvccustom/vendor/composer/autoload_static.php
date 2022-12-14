<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8c75738b0640dd21025e20237c395b0e
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'View\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/view',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8c75738b0640dd21025e20237c395b0e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8c75738b0640dd21025e20237c395b0e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8c75738b0640dd21025e20237c395b0e::$classMap;

        }, null, ClassLoader::class);
    }
}
