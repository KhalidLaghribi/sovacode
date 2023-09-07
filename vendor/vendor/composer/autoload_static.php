<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b92af2913c7e973ff89f2e720a89161
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b92af2913c7e973ff89f2e720a89161::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b92af2913c7e973ff89f2e720a89161::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7b92af2913c7e973ff89f2e720a89161::$classMap;

        }, null, ClassLoader::class);
    }
}