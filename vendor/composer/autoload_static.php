<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2360c0f48b640a034167dbf68fd06fea
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2360c0f48b640a034167dbf68fd06fea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2360c0f48b640a034167dbf68fd06fea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2360c0f48b640a034167dbf68fd06fea::$classMap;

        }, null, ClassLoader::class);
    }
}
