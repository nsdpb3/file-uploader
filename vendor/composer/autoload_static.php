<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6aec7a9a63cf2cb9030a831ec1a89e71
{
    public static $prefixLengthsPsr4 = array (
        'n' => 
        array (
            'nsdpb3\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'nsdpb3\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6aec7a9a63cf2cb9030a831ec1a89e71::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6aec7a9a63cf2cb9030a831ec1a89e71::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6aec7a9a63cf2cb9030a831ec1a89e71::$classMap;

        }, null, ClassLoader::class);
    }
}
