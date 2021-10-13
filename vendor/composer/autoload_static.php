<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1d12e7fd1c6c82204a219643b4c59db2
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mvc\\' => 4,
        ),
        'c' => 
        array (
            'criativa\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'criativa\\' => 
        array (
            0 => __DIR__ . '/..' . '/mtakeshi/mvc-framework/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1d12e7fd1c6c82204a219643b4c59db2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1d12e7fd1c6c82204a219643b4c59db2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1d12e7fd1c6c82204a219643b4c59db2::$classMap;

        }, null, ClassLoader::class);
    }
}
