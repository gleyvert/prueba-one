<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfbcfc13e8a5addc202341ffd44c85d1a
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfbcfc13e8a5addc202341ffd44c85d1a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfbcfc13e8a5addc202341ffd44c85d1a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfbcfc13e8a5addc202341ffd44c85d1a::$classMap;

        }, null, ClassLoader::class);
    }
}