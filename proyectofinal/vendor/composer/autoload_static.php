<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc1126ccadadf5c976b6019144767a43
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc1126ccadadf5c976b6019144767a43::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc1126ccadadf5c976b6019144767a43::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbc1126ccadadf5c976b6019144767a43::$classMap;

        }, null, ClassLoader::class);
    }
}