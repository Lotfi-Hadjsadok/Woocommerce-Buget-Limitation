<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb77e88646b69b4d7405e98900e2c42b8
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb77e88646b69b4d7405e98900e2c42b8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb77e88646b69b4d7405e98900e2c42b8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb77e88646b69b4d7405e98900e2c42b8::$classMap;

        }, null, ClassLoader::class);
    }
}
