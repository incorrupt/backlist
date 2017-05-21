<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb289006be2c16cce093f6057c240d69
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteb289006be2c16cce093f6057c240d69::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteb289006be2c16cce093f6057c240d69::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticIniteb289006be2c16cce093f6057c240d69::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
