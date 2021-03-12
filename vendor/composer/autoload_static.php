<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8c567a359ab9685c46342dae4ed2584
{
    public static $files = array (
        '03ff3594fdd731735102b9dbd1394210' => __DIR__ . '/..' . '/cmb2/cmb2/init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NEKO\\Basis\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NEKO\\Basis\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8c567a359ab9685c46342dae4ed2584::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8c567a359ab9685c46342dae4ed2584::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb8c567a359ab9685c46342dae4ed2584::$classMap;

        }, null, ClassLoader::class);
    }
}
